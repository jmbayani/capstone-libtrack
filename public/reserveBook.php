<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db-connect.php'; 

// Check if the data is being sent
$data = json_decode(file_get_contents("php://input"));

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid data received']);
    exit();
}

$prefix = "Reserve ID";

// Generate new Reserve ID based on the last one in the database
$sqlID = "SELECT Reserve_ID FROM book_reservation WHERE Reserve_ID LIKE '$prefix%' ORDER BY Reserve_ID DESC LIMIT 1";
$result = $conn->query($sqlID);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastId = $row['Reserve_ID'];
    $lastNumber = intval(substr($lastId, -3)); // Extract the last 3 digits
    $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); // Increment and pad with leading zeros
} else {
    $newNumber = "001"; // If no records exist, start with 001
}

$reserveID = $prefix . "-" . $newNumber; // Complete the Reserve ID

// Extract data from the JSON object
$accessionNumber = $data->accessionNumber;
$userEmail = $data->sesEmail;
$reservedBy = $data->reservedBy;
$readyDate = $data->readyDate;
$pickupLocation = $data->pickupLocation;
$needCopies = $data->needCopies;
$comments = $data->comments;

// Prepare SQL statement to insert data into the table
$sql = "INSERT INTO book_reservation (
            Reserve_ID, Accession_Number, User_Email, Reserved_By, Reserved_Date, 
            Total_Copies, Ready_Date, Pick_up_Location, User_Notes, 
            Status, Reserve_Timestamp
        ) VALUES (
            ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?, ?, ?, 'Pending', CURRENT_TIMESTAMP
        )";

// Prepare and bind parameters
if ($stmt = $conn->prepare($sql)) {
    // Bind the variables to the prepared statement
    $stmt->bind_param(
        "ssssisss",  // The data types: s = string, i = integer
        $reserveID,
        $accessionNumber,
        $userEmail,
        $reservedBy,
        $needCopies,
        $readyDate,
        $pickupLocation,
        $comments
    );

    // Execute the query
    if ($stmt->execute()) {
        // Send email after successful reservation
        if (email_sendupdate($userEmail, $reserveID, $readyDate, $pickupLocation)) {
            echo json_encode(['success' => true, 'message' => 'Reservation successful and email sent']);
        } else {
            echo json_encode(['success' => true, 'message' => 'Reservation successful, but email failed to send']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to reserve the book']);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Database query preparation failed']);
}

// Close the database connection
$conn->close();

// Email sending function
function email_sendupdate($userEmail, $reserveID, $readyDate, $pickupLocation) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rtulibtrack@gmail.com';
        $mail->Password = 'aqgrfmfhicmcajzc'; // use env variables in production!
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('rtulibtrack@gmail.com', 'Libtrack System');
        $mail->addAddress("jmbayani014@gmail.com");
        //$mail->addAddress($userEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Book Reservation Confirmation';
        $mail->Body = "
            <p>Hello,</p>
            <p>Your reservation has been successfully made.</p>
            <p><strong>Reservation ID:</strong> $reserveID</p>
            <p><strong>Ready for Pickup:</strong> $readyDate</p>
            <p><strong>Pick-up Location:</strong> $pickupLocation</p>
            <p>Thank you for using LibTrack!</p>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>
