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
    <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <h2 class="header-signup">Add Copy</h2>
        <div class="container-info">
            <form action=".php">
                <label class="label1">
                    Please scan the RFID tag in a book to add a new copy to the library system

                </label>

                <input type="number" id="scndbookcopycode" name="scndbookcopycode" placeholder="Scan the book" pattern="\d" required><br>



                <button class="scancopybtn" onclick="location.href = 'ManageBooks-AddCopy.php';">Scan book</button>
            </form>
        </div>

    </div>

</body>


<style>

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


    .label1 {
        font-size: 15px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        display: block;
        margin-top: 180px;
        margin-bottom: 20px;
    }


    input[type=numeric] {
        width: 560px;
        height: 40px;
        border: 3px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }

    input[type=number] {
        width: 571px;
        height: 49px;
        border: 3px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }

        input[type=number]:invalid, input[type=numeric]:invalid {
            border: 3px solid #ff0000;
        }


    .resendcodebtn {
        background: none;
        border: none;
        cursor: pointer;
        color: #5966EC;
        margin-left: 25px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
    }


        .resendcodebtn:hover {
            background: none;
            border: none;
            cursor: pointer;
            color: #2043D5;
        }


    .scancopybtn {
        background-color: #ffffff;
        color: #2043D5;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 450px;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
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


        .scancopybtn:hover {
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
<script>
        function fetchUID() {
            fetch('test2.php')
                .then(response => response.text())
                .then(uid => {
                    console.log("Fetched UID:", uid);
                    const uidField = document.getElementById('scndbookcopycode');
                    if (uidField) {
                        uidField.value = uid;
                    }
                })
                .catch(error => console.error("Fetch error:", error));
        }

        // Start fetching immediately and every 2 seconds
        window.addEventListener("DOMContentLoaded", () => {
            fetchUID();
            setInterval(fetchUID, 1000);
        });
</script>
</html>

