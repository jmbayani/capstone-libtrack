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
        <title>Data Privacy Policy</title>
    </head>
    <body>
        <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
        <div class="container-signup">
            <h2 class="header-signup">Privacy Policy</h2>
            <div class="container-info">
                <p class="dpplabel">
                    At <a style="color: #2043D5;">LibTrack: Automated Library Management System</a>, we are committed to protecting your
                    personal data in compliance with the Data Privacy Act of 2012 of the Philippines. By using the LibTrack system,
                    you agree to the collection, processing, and storage of your personal information as outlined in this policy.
                </p>

                <hr style="height:1.5px;border-width:0;color:black;background-color:black">

                <p class="dpplabel">
                    <a class="dpplabel-bold">What Information We Collect</a><br>
                    When you use LibTrack, we may collect the following personal information:
                    <ul class="dpplabel">
                        <li><a class="dpplabel-bold">User Details:</a> Name, Student/Guest ID, and email address for account creation and system communication.</li>
                        <br>
                        <li><a class="dpplabel-bold">Borrowing History:</a> Book titles, borrowing and return dates, overdue details, and penalties.</li>
                        <br>
                        <li><a class="dpplabel-bold">Activity Logs:</a> Search activity, book reservations, and system access timestamps.</li>
                    </ul>
                </p>

                <hr style="height:1.5px;border-width:0;color:black;background-color:black">

                <p class="dpplabel">
                    <a class="dpplabel-bold">How We Use Your Information</a><br>
                    Your data is collected and used to:
                    <ul class="dpplabel">
                        <li>Enable you to borrow and return books via our RFID self-check-in/check-out system.</li>
                        <br>
                        <li>Track and manage your borrowing history and overdue records.</li>
                        <br>
                        <li>Notify you of overdue books, penalties, or updates to the system.</li>
                        <br>
                        <li>Enhance system performance and user experience through data analysis.</li>
                    </ul>
                </p>

                <hr style="height:1.5px;border-width:0;color:black;background-color:black">

                <p class="dpplabel">
                    <a class="dpplabel-bold">How We Protect Your Data</a><br>
                    We implement advanced security measures to ensure your personal information remains confidential and protected. This includes:
                    <ul class="dpplabel">
                        <li>Secure servers for storing personal data.</li>
                        <br>
                        <li>Access controls limited to authorized librarians and system administrators.</li>
                        <br>
                        <li>Encryption of sensitive data to prevent unauthorized access.</li>
                        <br><br><br>
                      
                    </ul>
                </p>
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

        .dpplabel {
            font-size: 16px;
            font-family: "Libre Franklin", serif;
            font-weight: 400;
            font-style: normal;
        }
        .dpplabel-bold{
            font-size: 16px;
            font-family: "Libre Franklin", serif;
            font-weight: 700;
            font-style: normal;
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