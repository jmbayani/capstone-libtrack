<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT Institutional_Email, First_Name, Last_Name, Username, 
                   AES_DECRYPT(FROM_BASE64(PWD), '$key') AS PWD, User_Role
            FROM user_info 
            WHERE Username = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $account = $result->fetch_assoc();
        
        if ($account['PWD'] === $password) {
            // Set session using Institutional_Email as identifier
            $_SESSION['username'] = $account['Username'];
            $_SESSION['institutional_email'] = $account['Institutional_Email'];
            $_SESSION['name'] = $account['First_Name'] . ' ' . $account['Last_Name'];
            $_SESSION['logged_in'] = true;
            $_SESSION['user_role'] = $account['User_Role'];

            // Update login status in DB
            $update = $conn->prepare("UPDATE user_info 
                                     SET logged_in = 1, Online_Date = NOW() 
                                     WHERE Institutional_Email = ?");
            $update->bind_param("s", $account['Institutional_Email']);
            $update->execute();

            // Redirect based on role
            header($account['User_Role'] === "Library Admin" 
                   ? "Location: AdminLayout.php" 
                   : "Location: StudentLayout.php");
            exit();
        }
    }
    
    // Failed login
    echo "<script>
            alert('Invalid credentials');
            window.location.href = 'LoginLibTrack.php';
          </script>";
    exit();

        /* if($result->execute()){
            if()
            header("Location: StudentAccountCreated.php");
            exit();       
        }
        if ($conn->query($sql) === TRUE) {
            header("Location: StudentAccountCreated.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();*/
}
?>