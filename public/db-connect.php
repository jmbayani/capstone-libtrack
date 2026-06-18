<?php
$servername = "localhost";
$username = "libtrack-admin";
$password = "archivist@2024";
$dbname = "libtrack-db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$key='aV93NMVO27';
?>