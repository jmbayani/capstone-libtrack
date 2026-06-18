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
    <title>Student Sign Up</title>
</head>
<body>
    
    <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <h2 class="header-signup">SIGN UP</h2>
        <div class="container-info">
            <form method="POST" action="register-user.php">
                <div class="info-details">
                    <h2 class="header1-signup">Personal Information</h2>

                    <label for="fname">First name</label><br>
                    <input type="text" id="fname" name="fname" placeholder="Enter your first name" required><br>
                    <label for="mname">Middle name</label><br>
                    <input type="text" id="mname" name="mname" placeholder="Enter your middle name" required><br>
                    <label for="lname">Last name</label><br>
                    <input type="text" id="lname" name="lname" placeholder="Enter your last name" required><br>
                    <label for="age">Age</label><br>
                    <input type="number" id="age" name="age" placeholder="Enter your age" min="1" max="110" required><br>
                    <label for="contactnumber">Contact number</label><br>
                    <input type="numeric" id="contactnumber" name="contactnumber" placeholder="Enter your contact number" pattern="\d{11}" title="Please enter exactly 11 digits" required><br>

                    <h2 class="header1-signup">Student Information</h2>

                    <label for="iemail">Institutional email</label><br>
                    <input type="text" id="iemail" name="iemail" placeholder="Enter your institutional email &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;@rtu.edu.ph" title="Email Address must end with @rtu.edu.ph" required>
                    <label for="pemail">Personal email</label><br>
                    <input type="text" id="pemail" name="pemail" placeholder="Enter your personal email" required>
                    <label for="department">Department</label><br>
                    <select id="department" name="department" onchange="updateCourses()" required>
                        <option value="">Select your department</option>
                        <option value="cea">College of Engineering and Architecture</option>
                        <option value="ics">Institute of Computer Studies</option>
                        <option value="iarch">Institute of Architecture</option>
                        <option value="cbea">College of Business, Entrepreneurship and Accountancy</option>
                        <option value="ced">College of Education</option>
                        <option value="cas">College of Arts and Sciences</option>
                        <option value="ihk">Institute of Human Kinetics</option>
                    </select>
                    </div>

                    <label for="courses">Course</label><br>
                    <select id="courses" name="course"  required>
                        <option value="">Select your course</option>
                    </select>

                    <label for="campus">Campus</label><br>
                    <select id="campus"  name="campus"  required>
                        <option value="">Select your campus/branch</option>
                        <option value="Boni">Boni</option>
                        <option value="Pasig">Pasig</option>
                    </select>

                    <h2 class="header1-signup">LibTrack Account</h2>

                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required><br>
                    <label for="password">Password</label><br>
                    <div class="password-field">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <span><i id="toggler" class="far fa-eye"></i></span>
                    </div>
                    <label for="confirmpassword">Confirm password</label><br>
                    <div class="confirm-password-field">
                        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Enter your password" required>
                        <span><i id="toggler1" class="far fa-eye"></i></span>
                    </div>

                    <button type="submit" class="registerbtn">Register</button>

                    <div class="checkbox-wrapper" required>
                        <input type="checkbox" id="check" title="Checkbox must be checked" required>
                        <label class="checkboxlabel" for="checkboxlabel">I have read and understood the <a class="data-privacybtnlink" href="DataPrivacyPolicy.php" rel="noopener noreferrer">Data Privacy Policy</a>, and I agree to the collection and use of my personal data as described.</label>
                    </div>
                </div>
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
    input[type=text], input[type=number], 
    input[type=email], input[type=password], 
    input[type=numeric] {
        width: 560px;
        height: 40px;
        border: 3.5px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }

    select::-ms-expand {
        display: none;
    }
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 570px;
        height: 45px;
        border: 3.5px solid #2043D5;
        padding: 10px;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }
    .select::after {
        content: '\25BC';
        position: absolute;
        top: 0;
        right: 0;
        transition: .25s all ease;
        pointer-events: none;
    }
    .info-details {
        font-family: "Linden Hill", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 20px;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    ::-webkit-scrollbar {
        display: none;
    }


    input[type=text]:invalid, input[type=number]:invalid, input[type=numeric]:invalid {
        border: 3.5px solid #ff0000;
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
            margin-bottom: 10px;
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

        .confirm-password-field input {
            width: 560px;
            height: 40px;
            border: 3.5px solid #2043D5;
            border-radius: 30px;
            font-family: poppins;
            font-size: 16px;
            text-indent: 25px;
            margin-bottom: 10px;
        }

            .confirm-password-field input::placeholder {
                color: #808080;
                font-family: poppins;
                font-size: 16px;
            }

        .confirm-password-field #toggler1 {
            position: absolute;
            right: 25px;
            top: 25px;
            transform: translateY(-50%);
            cursor: pointer;
        }

    .registerbtn {
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

        .registerbtn:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }

    .checkbox-wrapper {
        height: 40px;
        width: 610px;
        transform: translate(-10%, -10%);
        margin-top: 0px;
        margin-left: 45px;
        margin-bottom: 80px;
        display: inline-flex;
        align-items: center;
        justify-content: space-evenly;
    }

    input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        height: 30px;
        width: 43px;
        background-color: #ffffff;
        border-radius: 0.5em;
        cursor: pointer;
        display: flex;
        outline: none;
        align-items: center;
        justify-content: center;
        border: 3px solid black;
        margin-right: 10px;
    }

    .checkboxlabel {
        color: #000000;
        font-size: 15px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
    }

    input[type="checkbox"]:after {
        font-family: "Font Awesome 6 Free";
        content: "\f00c";
        font-weight: 900;
        font-size: 20px;
        color: #ffffff;
        display: none;
    }

    input[type="checkbox"]:hover {
        background-color: #5966EC;
    }

    input[type="checkbox"]:checked {
        background-color: #5966EC;
        border: 3px solid #5966EC;
    }

        input[type="checkbox"]:checked:after {
            display: block;
        }

    .data-privacybtnlink:link {
        color: #5966EC;
        background-color: transparent;
        text-decoration: none;
    }

    .data-privacybtnlink:visited {
        color: purple;
        background-color: transparent;
        text-decoration: none;
    }

    .data-privacybtnlink:hover {
        color: #2038AD;
        background-color: transparent;
        text-decoration: underline;
    }

    .data-privacybtnlink:active {
        color: #2038AD;
        background-color: transparent;
        text-decoration: underline;
    }

</style>

<script src="script/studentSignUp.js" defer></script>
</html>
