
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,255;1,255&family=Lilita+One&family=Linden+Hill:ital@0;1&family=Marhey:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>LibTrack Login</title>
</head>
<body>
    <button class="button-home"  onclick="location.href='MainLayout.php'" rel="noopener noreferrer">Home</button>
    
    <div class="container-slogan">
        <p class="slogan">
            Connecting You to
            Knowledge,<br>
            One Click at a Time
        </p>

        <img class="image-logo" src="img/libtrack-logo.png" alt="LibTrack logo">
    </div>
    

    <div class="container-signup">
        <h2 class="header-signup">LOG IN</h2>
        <div class="container-info">
            <form action="login-user.php" method="POST">
                <div class="info-details">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required><br>

                    <label for="password">Password</label><br>
                    <div class="password-field">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <span><i id="toggler" class="far fa-eye"></i></span>
                    </div>

                    <!--<button type="submit" class="loginbtn" onclick="location.href='StudentLayout.php'">Log in</button>--->
                    <button type="submit" class="loginbtn">Log in</button>
                </div>
            </form>

            <form action="backend_script/forgot_password.php" method="POST">
            <button class="forgotpasswordbtn" name="forgot_password" >Forgot password?</button>
            </form>
            <label class="signup-btn">Don’t have an account?</label>
            <button class="signup-btn1" onclick="location.href='SignUpChoices.php'">Sign Up</button>
        </div>

    </div>
</body>

<style>
    .button-home {
        width: 130px;
        height: 35px;
        position: fixed;
        left: 20px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 10px 0px 0px 10px;
        background-color: #EFF5FF;
        border: 3.5px solid #2043D5;
        color: #2043D5;
        border-radius: 15px;
        cursor: pointer;
    }

        .button-home:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }

    body {
        background-color: #2038AD;
    }

    .container-slogan {
        height: 700px;
        width: 800px;
        border-radius: 50px;
        margin: 0;
        position: absolute;
        top: 55%;
        left: 30%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        color: #ffffff;
    }
    .slogan {
        font-size: 76px;
        font-family: "Marhey", serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;

    }

    .image-logo {
        width: 340px;
        height: 120px;
        margin: 0;
        position: absolute;
        top: 86%;
        left: 18%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .container-signup {
        height: 700px;
        width: 650px;
        border-radius: 50px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 77%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #EFF5FF;
        overflow: auto;
    }

    .container-info {
        padding-left: 40px;
        padding-right: 40px;
    }

    .header-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 60px;
        text-align: center;
    }

    .header1-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 25px;
    }

    .info-details {
        font-family: "Linden Hill", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 20px;
        margin-top: 70px;
    }

    input[type=text] {
        width: 560px;
        height: 40px;
        border: 3.5px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 30px;
    }

    .password-field {
        position: relative;
    }

        .password-field input {
            width: 560px;
            height: 40px;
            border: 3.5px solid #2043D5;
            border-radius: 30px;
            font-family: poppins;
            font-size: 16px;
            text-indent: 25px;
            margin-bottom: 30px;
        }

            .password-field input::placeholder {
                color: #808080;
                font-family: poppins;
                font-size: 16px;
            }

        .password-field #toggler {
            position: absolute;
            right: 25px;
            top: 25px;
            transform: translateY(-50%);
            cursor: pointer;
        }

    .confirm-password-field {
        position: relative;
    }

    .loginbtn {
        background-color: #ffffff;
        color: #2043D5;
        text-align: center;
        margin: 30px 210px;
        border: 3.5px solid #2043D5;
        border-radius: 15px;
        cursor: pointer;
        width: 150px;
        height: 40px;
        font-size: 16px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
    }

        .loginbtn:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }

    .forgotpasswordbtn {
        background: none;
        border: none;
        cursor: pointer;
        color: #000000;
        font-size: 16px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 550px;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

        .forgotpasswordbtn:hover {
            background: none;
            border: none;
            cursor: pointer;
            color: #5966EC;
        }

    .signup-btn {
        font-size: 19px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 600px;
        left: 44%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .signup-btn1 {
        background: none;
        border: none;
        cursor: pointer;
        color: #5966EC;
        font-size: 19px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 600px;
        left: 67%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .signup-btn1:hover {
        background: none;
        border: none;
        cursor: pointer;
        color: #2043D5;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    ::-webkit-scrollbar {
        display: none;
    }
</style>

<script src="script/pwToggle.js">
</script>
</html>