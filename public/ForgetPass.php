<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
        <title>Forget Password</title>

        <style>
		body {
            background-color: #2038AD;
            margin: 0;
            display: flex;
            align-items: center;
            flex-direction: column;
		}
        h1{
            text-align: center;
            font-size: 50px;
        }
		.content {
            border-radius: 100px;
            width: 50%;
            height: auto;
            margin: 20px;
            background-color: #EFF5FF;
		}
        input[type=text].search-text{
            border: 3px solid #2043D5;
            border-radius: 30px;
            padding: 5px 5px 5px 30px;
            margin: 5px 10px;
            width: 75%;
            cursor: pointer;
		}
        input[type=text].enter-code{
            border: 3px solid #2043D5;
            border-radius: 30px;
            padding: 5px 5px 5px 30px;
            margin: 5px 10px;
            width: 75%;
            display: none;
            cursor: pointer;
		}
        button.submit-pass {
            width: 20%;
            background-color: #fff;
			color: #2043D5;
            border: 3px solid #2043D5;
            padding: 10px;
            margin: 60px 0;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.2s;
		}
        button.reset-pass {
            width: 20%;
            display: none;
            background-color: #fff;
			color: #2043D5;
            border: 3px solid #2043D5;
            padding: 10px;
            margin: 60px 0;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.2s;
		}
        .password-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .resend-container {
            text-align: left;
            margin-left: 115px;
        }
		.button-back {
            position: fixed;
            left: 20px;
            padding: 2px 50px;
            font-size: 16px;
            margin: 10px 0px 0px 10px;
            font-weight: bold;
            background-color: #EFF5FF;
            border: 5px solid #2043D5;
            color: #2043D5;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
		}
		.button-back:hover {
            background-color: #2043D5;
            text-decoration: underline;
            color: white;
		}
        .resend-code{
            color: #2043D5;
            text-decoration: none;
            margin: 2px 0px;
            cursor: pointer;
        }
        .resend-code:hover{
            text-decoration: underline;
        }
        #forgetPass1{
            margin: 20px;
            padding: 80px 0px;
            text-align: center;
            font-size: 15px;
        }
        #forgetPass2{
            margin: 20px;
            padding: 80px 0px;
            text-align: center;
            font-size: 15px;
            display: none;
        }
        .forget-info{
            margin: 20px;
            padding: 50px 0px;
            text-align: center;
            font-size: 15px;
            color: gray;
        }
	</style>
	</head>
	<body class='poppins-regular'>
        <div class="back-container">
		    <a class="button-back poppins-regular" href="LoginLibtrack.php">Back</a>
        </div>

<?php if($_SESSION['pass'] === "Forgot_Pass"): ?>
        <div class="content">
            <form action="backend_script/forgot_password.php" method="POST">
                <h1 class="lilita-one-regular">Password Recovery</h1>
                <p id="forgetPass1" class="libre-franklin-regular">To recover your account, submit your email address below and you will receive an email with instructions about account retrieval</p>
            <div class="password-container">
                    <input id="forgetPassTxt1" class="poppins-regular search-text" type="text" placeholder="Enter your email address" name="email">
                </div>
                <div class="button-container">
                    <button id="forgetPassBtn1" class="submit-pass poppins-regular" name="send_otp" >Submit</button>
                    <button id="forgetPassBtn2" class="reset-pass poppins-regular" >Reset Password</button>
                </div>
                <p class="libre-franklin-regular forget-info">If you're unable to provide the information for password recovery, please visit the library and ask the Librarian Administrator for help with your account password.</p>
            </form>
        </div>


<?php elseif($_SESSION['pass'] === "otp_pin"): ?>
    <div class="content">
            <form action="backend_script/forgot_password.php" method="POST">
                <h1 class="lilita-one-regular">Password Recovery</h1>
                <p id="forgetPass1" class="libre-franklin-regular">To change your password, a code with expiration will be sent to your email. Click re-send if you didn’t received the code</p>
                <div class="password-container">
                    <input id="forgetPassTxt1" class="poppins-regular search-text" type="text" placeholder="Enter the Code" name="code" maxlength="6">
                </div>
                <div class="button-container">
                    <button id="forgetPassBtn1" class="submit-pass poppins-regular" name="confirm_otp" >Submit</button>
                </div>
                <p class="libre-franklin-regular forget-info">If you're unable to provide the information for password recovery, please visit the library and ask the Librarian Administrator for help with your account password.</p>
            </form>
        </div>


<?php elseif($_SESSION['pass'] === "new_pass"): ?>
        <div class="content">
            <form action="backend_script/forgot_password.php" method="POST">
                <h1 class="lilita-one-regular">New Password</h1>
                <p id="forgetPass1" class="libre-franklin-regular">To recover your account, submit your email address below and you will receive an email with instructions about account retrieval</p>
            <div class="password-container">
                    <input id="forgetPassTxt1" class="poppins-regular search-text" type="text" placeholder="Enter your email address" name="email">
                </div>
                <div class="button-container">
                    <button id="forgetPassBtn1" class="submit-pass poppins-regular" name="send_otp" >Submit</button>
                    <button id="forgetPassBtn2" class="reset-pass poppins-regular" >Reset Password</button>
                </div>
                <p class="libre-franklin-regular forget-info">If you're unable to provide the information for password recovery, please visit the library and ask the Librarian Administrator for help with your account password.</p>
            </form>
        </div>
<?php endif; ?>
    <script>
        function hideForgetPass1() {
            var hideDesc1 = document.getElementById("forgetPass1");
            var hideDesc2 = document.getElementById("forgetPass2");
            var hideBtn1 = document.getElementById("forgetPassBtn1");
            var hideBtn2 = document.getElementById("forgetPassBtn2");
            var hideTxt1 = document.getElementById("forgetPassTxt1");
            var hideTxt2 = document.getElementById("forgetPassTxt2");
            
            if (hideDesc1.style.display === "none") {
                hideDesc1.style.display = "block";
                hideBtn1.style.display = "block";
                hideTxt1.style.display = "block";
                hideDesc2.style.display = "none";
                hideBtn2.style.display = "none";
                hideTxt2.style.display = "none";
            } else {
                hideDesc1.style.display = "none";
                hideBtn1.style.display = "none";
                hideTxt1.style.display = "none";
                hideDesc2.style.display = "block";
                hideBtn2.style.display = "block";
                hideTxt2.style.display = "block";
            }
        }
    </script>
	</body>
</html>
