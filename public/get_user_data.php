<?php
// Start session and enforce cookie settings
session_start([
    'cookie_lifetime' => 86400,
    'cookie_secure'   => false,
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax'
]);

// Debug: Log session state
error_log("API Session: " . print_r($_SESSION, true));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libtrack-db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

// Check if user is properly logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || !isset($_SESSION['institutional_email'])) {
    die(json_encode(['error' => 'Not logged in']));
}

// Fetch user data
$stmt = $conn->prepare("
    SELECT * FROM user_info 
    WHERE Institutional_Email = ? AND logged_in = 1
");
$stmt->bind_param("s", $_SESSION['institutional_email']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    unset($user['PWD']); // Remove password
    echo json_encode($user);
} else {
    // Clear session if DB record doesn't match
    session_unset();
    session_destroy();
    echo json_encode(['error' => 'Session expired or invalid login']);
}

$stmt->close();
$conn->close();
?>