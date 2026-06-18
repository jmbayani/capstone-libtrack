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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sign Up Choices</title>
</head>
<body>
    <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <h2 class="header-signup">SIGN UP</h2>
        <div class="container-info">
            <a class="student-signupbtn" href="StudentSignUp.php">Student</a>
        </div>
    </div>
</body>

<style>
    /* Missing functions: Error Outputs: validate pass and confirm pass, Dropdown not selected scenario*/

    .button-back {
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

        .button-back:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }

    body {
        background-color: #2038AD;
    }

    .container-signup {
        height: 700px;
        width: 650px;
        border-radius: 50px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #EFF5FF;
        overflow: auto;
    }

    .container-info {
        padding-left: 40px;
        padding-right: 40px; margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .header-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 40px;
        text-align: center;
    }

    .header1-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 25px;
    }

    .student-signupbtn {
        background-color: #ffffff;
        color: #2043D5;
        text-align: center;
        text-decoration: none;
        margin: 0;
        padding: 10px 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        border: 3.5px solid #2043D5;
        border-radius: 15px;
        cursor: pointer;
        width: 150px;
        font-size: 16px;
        font-family: "Libre Franklin", serif;
        font-weight: 600;
        font-style: normal;
    }

        .student-signupbtn:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
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
</html>