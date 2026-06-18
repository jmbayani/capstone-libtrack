<?php

session_start();
include '../db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Done"])) {
        $id = $_POST["patron_id"];
        $dateTime = new DateTime(); // Create a DateTime object for the current time
        $formattedDate = $dateTime->format('F j, Y - H:i:s'); // Format as "March 30, 2025 - 20:07:52"
        
        // Prepare the query to fetch required data
        $check_query = "SELECT 
        (SELECT COUNT(*) FROM user_info) AS cnt_visit, 
        First_Name, 
        Last_Name, 
        SUBSTRING_INDEX(Institutional_Email, '@', 1) AS processed_id 
    FROM user_info 
    WHERE SUBSTRING_INDEX(Institutional_Email, '@', 1) = ?";
                        
        $stmt_check = $conn->prepare($check_query);
        $stmt_check->bind_param("s", $id);
        $stmt_check->execute();
        $result = $stmt_check->get_result();
        
        // Check for valid query execution and fetch results
        if ($result && $row = $result->fetch_assoc()) {
            $_SESSION['patron_id'] = $id;
            $_SESSION['visits'] = $row["cnt_visit"];
            $_SESSION['Full_Name'] = $row["First_Name"] . ' ' . $row["Last_Name"];
            $name = $row["First_Name"] . ' ' . $row["Last_Name"];
            $_SESSION['patron_type'] = "display";
            
            $check_query = "INSERT INTO Patron_Attendance(Patron_ID, Full_Name, Current_Date_Time) VALUES
            (?, ?, ?)";
                            
            $stmt_check = $conn->prepare($check_query);
            $stmt_check->bind_param("sss", $id, $name, $formattedDate);
            $stmt_check->execute();
            header("Location: ../PatronAttendance.php");
        } else {
            echo "<script>
            alert('The student ID was not found or unavailable.');
            window.location.href = '../PatronAttendance.php';
            </script>";
        }
        exit();
    }
    elseif(isset($_POST["back"])){
        $_SESSION['patron_type'] = "info";
        header("Location: ../PatronAttendance.php");
        exit();
    }
}




?>