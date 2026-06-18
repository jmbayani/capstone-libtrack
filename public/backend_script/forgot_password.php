<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

session_start();
include '../db-connect.php';


function email_generateOTP($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

function email_sendOTP($email, $otp) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rtulibtrack@gmail.com';
    $mail->Password = 'aqgrfmfhicmcajzc'; // Consider using environment variables for better security
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('rtulibtrack@gmail.com', 'Libtrack System');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Account Recovery Verification';
    $mail->Body = '
        <p>Greetings,</p>
        <p>This is your One-Time Passcode Authentication, and we encourage you to not share this OTP Authentication with anyone.</p>
        <div style="text-align: center; font-weight: bold; font-size: 1.5rem">
            <p>Your OTP is:</p>
            <p>' . $otp . '</p>
        </div>';

    try {
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["forgot_password"])){
        $_SESSION['pass'] = "Forgot_Pass";
        header("Location: ../ForgetPass.php");
    }
    elseif(isset($_POST["send_otp"])){
        $email = $_POST["email"];
        
        $check_query = "SELECT * FROM user_info WHERE Institutional_Email = ?";
        $stmt = $conn->prepare($check_query);
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit();
        }
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            echo "<script>
                    alert('The email you provided is not valid, or not found in the system.');
                    window.location.href = '../ForgetPass.php';
                  </script>";
            exit();
        } else {
            $otp = email_generateOTP();
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;
        
            $otpSent = email_sendOTP($email, $otp);
        
            if (!$otpSent) {
                echo "<script>
                        alert('Failed to send OTP. Please try again later.');
                        window.location.href = '../ForgetPass.php';
                      </script>";
                exit();
            }
        
            echo "<script>
                    alert('Verification code was sent to your email.');
                    window.location.href = '../ForgetPass.php';
                  </script>";
            $_SESSION['pass'] = "otp_pin";
            exit();
        }
    }
    elseif(isset($_POST["confirm_otp"])){
        $code = $_POST["code"];

        if($code != $_SESSION['otp']){
            echo "<script>
            alert('Wrong OTP Code. Please try again');
            window.location.href = '../ForgetPass.php';
          </script>";
        }
        else{
            echo "<script>
            alert('OTP Successfully matched, you may now changed your Password');
            window.location.href = '../StudentForgetPass.php';
          </script>";
        }
    }
    elseif(isset($_POST["update_password"])){
        $new_pass = $_POST["new_pass"];
        $confirm_pass = $_POST["confirm_pass"];

        if($new_pass != $confirm_pass){
            echo "<script>
            alert('Password not Match. Please try again');
            window.location.href = '../StudentForgetPass.php';
          </script>";
        }
        else{
            $update_query = "UPDATE user_info SET PWD = TO_BASE64(AES_ENCRYPT(?, ?)) WHERE Institutional_Email = ?";

            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("sss", $confirm_pass, $key, $_SESSION['email']);
    
            if ($stmt->execute()) {
                echo "<script>
                alert('Password Successfully Change');
                window.location.href = '../LoginLibTrack.php';
            </script>";
        }
        }
    }
    exit();
}




?>