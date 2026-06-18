<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

session_start();
include 'db-connect.php';

function email_sendupdate($email) { // Exaample of PHPMailer usage
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rtulibtrack@gmail.com';
    $mail->Password = 'aqgrfmfhicmcajzc'; // Consider using environment variables for better security
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('rtulibtrack@gmail.com', 'Libtrack System');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'LibTrack Account Successfully Created!';
    $mail->Body = '
            <p>Greetings,</p> 
             <p>Your account is now active and ready to use. Enjoy streamlined access to borrowing, returning, and tracking books efficiently with RFID technology. Welcome to LibTrack!</p>';
    try {
        $mail->send();
        echo "Email has been sent successfully!";
        return true;
    } catch (Exception $e) {
        echo "Email sending failed: " . $e->getMessage();
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $contactnumber = $_POST['contactnumber'];
        $iemail = $_POST['iemail'];
        $pemail = $_POST['pemail'];
        $department = $_POST['department'];
        $course = $_POST['course'];
        $campus = $_POST['campus'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        

        $sql = "INSERT INTO user_info (First_Name, Middle_Name, Last_Name, Age, Contact_No, Institutional_Email, Personal_Email, Department, Course, Campus, Username, PWD, User_Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, TO_BASE64(AES_ENCRYPT(?, ?)), 'Student')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssss", $fname, $mname, $lname, $age, $contactnumber, $iemail, $pemail, $department, $course, $campus, $username, $password, $key);
       

        if($stmt->execute()){
            if($password !== $confirmpassword) {
                echo "<script>alert('Password does not match to Confirm Password.');</script>";
                exit();
            } else {
                $sqlUAI = "INSERT INTO user_accounts_info (Email, Total_Loaned, Total_Fines, Total_Restrictions) VALUES (?, '0', '0', '0')";
                $stmtUAI = $conn->prepare($sqlUAI);
                $stmtUAI->bind_param("s", $iemail);
                $stmtUAI->execute();
                email_sendupdate($pemail); // Send email after successful registration
                header("Location: StudentAccountCreated.php");
                exit();      
            }
 
        }
}
?>