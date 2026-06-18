<?php
session_start();
include 'db-connect.php'; // Reuse your existing connection file

// Verify user is actually logged in before attempting logout
if (!isset($_SESSION['logged_in'])) {
    header("Location: LoginLibTrack.php");
    exit();
}

// Get the institutional email from session
$institutional_email = $_SESSION['institutional_email'];

// 1. Update database (set logged_in = 0)
$update = $conn->prepare("UPDATE user_info 
                         SET logged_in = 0 
                         WHERE Institutional_Email = ?");
$update->bind_param("s", $institutional_email);
$update->execute();

// 2. Destroy all session data
$_SESSION = array(); // Clear session variables

// 3. Delete session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Destroy session
session_destroy();

// 5. Redirect to login page with success message
header("Location: LoginLibTrack.php?logout=success");
exit();
?>