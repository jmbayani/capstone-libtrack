<?php
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uid'])) {
    $uid = $_POST['uid'];
    
    // Insert the new UID
    $stmt = $conn->prepare("INSERT INTO rfid_books (UID) VALUES (?)");
    $stmt->bind_param("s", $uid);
    
    if ($stmt->execute()) {
        echo "UID saved successfully!";
    } else {
        echo "Error saving UID: " . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();

// Redirect back after 3 seconds
header("refresh:3;url=index.php");
?>