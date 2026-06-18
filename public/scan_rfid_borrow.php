<?php
include 'db-connect.php';
$result = $conn->query("SELECT UID FROM rfid_books ORDER BY UID DESC LIMIT 1");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $uid = $row['UID'];

    echo htmlspecialchars($uid);
} else {
    echo '';
}

?>
