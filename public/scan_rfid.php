<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$uidFile = 'last_uid.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uid'])) {
    $uid = trim($_POST['uid']);
    file_put_contents($uidFile, $uid);
    echo "UID received: " . htmlspecialchars($uid);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (file_exists($uidFile)) {
        echo htmlspecialchars(trim(file_get_contents($uidFile)));
    } else {
        echo "";
    }
    exit;
}
?>