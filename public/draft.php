<?php
include 'db-connect.php';
session_start();

header('Content-Type: application/json');

// Get POST JSON data
$data = json_decode(file_get_contents("php://input"), true);

// Example session values (replace with your logic)
$user_email = $_SESSION['user_email'] ?? 'user@example.com';
$reserved_by = $_SESSION['username'] ?? 'Default User';

$readyDate = $data['readyDate'];
$copies = (int)$data['needCopies'];
$comments = $data['comments'] ?? '';
$status = 'Pending';

// Generate new Reserve_ID
$getLastIDQuery = "SELECT Reserve_ID FROM book_reservation ORDER BY id DESC LIMIT 1"; // Ensure there's an `id` column
$result = $conn->query($getLastIDQuery);

if ($result && $result->num_rows > 0) {
    $lastRow = $result->fetch_assoc();
    preg_match('/(\d+)$/', $lastRow['Reserve_ID'], $matches);
    $newNumber = isset($matches[1]) ? intval($matches[1]) + 1 : 1;
} else {
    $newNumber = 1;
}

$newReserveID = "Reserve ID-" . $newNumber;

// Insert into DB
$stmt = $conn->prepare("INSERT INTO book_reservation (Reserve_ID, User_Email, Reserved_By, Reserved_Date, Total_Copies, Status) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssis", $newReserveID, $user_email, $reserved_by, $readyDate, $copies, $status);

if ($stmt->execute()) {
    echo json_encode(["message" => "Reservation submitted successfully!", "Reserve_ID" => $newReserveID]);
} else {
    echo json_encode(["error" => "Failed to insert reservation."]);
}

$stmt->close();
$conn->close();
?>
