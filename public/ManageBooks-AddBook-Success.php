 ﻿
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" />

    <link href="https://fonts.googleapis.com/css2?family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Libre Franklin:ital,wght@0,100..900;1,100..900&family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>

    <title>LibTrack</title>

</head>

<body>

    <button class="button-back" onclick="history.back()" target="_self" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <div class="container-info">
            <img class="image-check" src="img/check.png" alt="Check in a Circle">

            <h2 class="header1-signup">Book Added Successfully!!</h2>



            <label class="label2">Back to <a class="login-btnlink" onclick="window.top.location.href = 'AdminLayout.php';" rel="noopener noreferrer">Manage Books</a></label>

        </div>

    </div>

</body>


<style>
    .image-check {
        width: 150px;
        height: 150px;
        display: block;
        margin-top: 120px;
        margin-left: auto;
        margin-right: auto;
    }


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
        padding-right: 40px;
        margin-top: 170px;
    }



    .header1-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 40px;
        text-align: center;
        margin-top: 40px;
    }


    .label1 {
        font-size: 15px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        display: block;
        margin-top: -20px;
        margin-bottom: 200px;
    }


    .label2 {
        font-size: 16px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        display: block;
        margin-top: 230px;
    }


    .login-btnlink:link {
        color: #5966EC;
        background-color: transparent;
        text-decoration: none;
    }


    .login-btnlink:visited {
        color: purple;
        background-color: transparent;
        text-decoration: none;
    }


    .login-btnlink:hover {
        color: #2038AD;
        background-color: transparent;
        text-decoration: underline;
    }


    .login-btnlink:active {
        color: #2038AD;
        background-color: transparent;
        text-decoration: underline;
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
