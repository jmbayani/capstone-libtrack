<?php
include 'db-connect.php';
session_start();

$insti_email = $_SESSION['institutional_email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $contactnumber = $_POST['contactnumber'];
    $pemail = $_POST['pemail'];
    $department = $_POST['department'];
    $course = $_POST['course'];
    $campus = $_POST['campus'];
    $username = $_POST['username'];

    $sql = "UPDATE user_info SET First_Name = ?, Middle_Name = ?, Last_Name = ?, Age = ?, Contact_No = ?, Personal_Email = ?, Department = ?, Course = ?, Campus = ?, Username = ? WHERE Institutional_Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $fname, $mname, $lname, $age, $contactnumber, $pemail, $department, $course, $campus, $username, $insti_email);
   
    if ($stmt->execute()) {
        echo "<script>
                alert('Record updated successfully');
                window.location.href = 'StudentLayout.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Error updating record');
                window.location.href = 'LoginLibTrack.php';
              </script>";
        exit();
    }
}
?>