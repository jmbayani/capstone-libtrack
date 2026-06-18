<?php
include 'db-connect.php';

session_start();
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentPass = $_POST['current-pass'];
    $newPass = $_POST['new-pass'];
    $reEnterPass = $_POST['reenter-pass'];

    $sql = "SELECT AES_DECRYPT(FROM_BASE64(PWD), '$key') AS PWD FROM user_info WHERE username = '$username'";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userPass = $row['PWD'];
            // Check if current password is correct
            if ($currentPass !== $$userPass) {
                echo "<script>
                alert('Current password is incorrect!');
                window.location.href = 'StudentChangePass.php';
                </script>";
            }
            // Check if new passwords match
            elseif ($newPass !== $reEnterPass) {
                echo "<script>
                alert('New password and retype password do not match!');
                window.location.href = 'StudentChangePass.php';
                </script>";
            }
            // Check if new password is different from current password
            elseif ($newPass === $currentPass) {
                echo "<script>
                alert('New password cannot be the same as the current password!!');
                window.location.href = 'StudentChangePass.php';
                </script>";
            }
            // If all validations pass, update the password (for the example, we'll just display a success message)
            else {
                // In a real scenario, update the password in the database
                // $newPassword has been validated, so you can hash it before saving
                // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                echo "<script>
                alert('Password updated successfully!');
                </script>";
            }
        }


}
?>