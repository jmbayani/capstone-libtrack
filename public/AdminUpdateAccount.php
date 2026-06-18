<?php
include 'db-connect.php';
session_start();
    
    $insti_email = $_SESSION['institutional_email'];

    // Fetch book details from the database
    $sql = "SELECT * FROM user_info WHERE Institutional_Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $insti_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


?>
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
<body class="no-select">
    
    <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <h2 class="header-signup">Update Account Details</h2>
        <div class="container-info">
            <form action="update_admin.php" method="POST">
                <div class="info-details">
                    <h2 class="header1-signup">Personal Information</h2>

                    <label for="fname">First name</label><br>
                    <input type="text" id="fname" name="fname" value="<?= htmlspecialchars($user['First_Name'])?>" placeholder="Enter your first name" required><br>
                    <label for="mname">Middle name</label><br>
                    <input type="text" id="mname" name="mname" value="<?= htmlspecialchars($user['Middle_Name'])?>"placeholder="Enter your middle name" required><br>
                    <label for="lname">Last name</label><br>
                    <input type="text" id="lname" name="lname" value="<?= htmlspecialchars($user['Last_Name'])?>" placeholder="Enter your last name" required><br>
                    <label for="age">Age</label><br>
                    <input type="number" id="age" name="age" value="<?= htmlspecialchars($user['Age'])?>" placeholder="Enter your age" min="1" max="110" required><br>
                    <label for="contactnumber">Contact number</label><br>
                    <input type="numeric" id="contactnumber" name="contactnumber" value="<?= htmlspecialchars($user['Contact_No'])?>" placeholder="Enter your contact number" pattern="\d{11}" title="Please enter exactly 11 digits" required><br>

                    <h2 class="header1-signup">Student Information</h2>

                    <label for="iemail">Institutional email</label><br>
                    <input type="text" id="iemail" name="iemail" value="<?= htmlspecialchars($user['Institutional_Email'])?>" placeholder="Enter your institutional email" pattern=".+@rtu.edu.ph" disabled>
                    <label for="pemail">Personal email</label><br>
                    <input type="text" id="pemail" name="pemail" value="<?= htmlspecialchars($user['Personal_Email'])?>" placeholder="Enter your personal email" required>

                    <h2 class="header1-signup">LibTrack Account</h2>

                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['Username'])?>" placeholder="Enter your username" required><br>

                    <button type="submit" class="registerbtn">Update</button>
                </div>
            </form>
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

    .no-select {
		-webkit-touch-callout: none; /* iOS Safari */
		-webkit-user-select: none; /* Safari */
		-khtml-user-select: none; /* Konqueror HTML */
		-moz-user-select: none; /* Old versions of Firefox */
		-ms-user-select: none; /* Internet Explorer/Edge */
		user-select: none; /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
	}

    .container-signup {
        height: 700px;
        width: 750px;
        border-radius: 50px;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #EFF5FF;
        overflow: auto;
    }
    .container-info {
        padding-left: 90px;
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
    input[type=email], input[type=numeric] {
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
    /* The container must be positioned relative: */
    .custom-select {
        height: 40px;
        width: 565px;
        position: relative;
        font-family: poppins;
        background-color: #EFF5FF;
        border: 3.5px solid ;
        border-radius: 30px;
        font-size: 16px;
        margin-bottom: 10px;
    }

        .custom-select select {
            display: none; /*hide original SELECT element: */

        }

    .select-selected {
        border-radius: 30px;
        border: 3.5px solid #2043D5;
    }

        /* Style the arrow inside the select element: */
        .select-selected:after {
            position: absolute;
            content: "";
            top: 16px;
            right: 20px;
            width: 0;
            height: 0;
            border: 8px solid transparent;
            border-color: black transparent transparent transparent;

        }

        /* Point the arrow upwards when the select box is open (active): */
        .select-selected.select-arrow-active:after {
            border-color: transparent transparent black transparent;
            top: 7px;
        }

    /* style the items (options), including the selected item: */
    .select-items div {
        color: black;
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 25px;
        padding-right: 55px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
    }
    .select-selected {
        color: black;
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 25px;
        padding-right: 55px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
        overflow: auto;
        word-wrap: break-word;
        border-radius: 30px;
        height: 23px;
    }

    /* Style items (options): */
    .select-items {
        position: absolute;
        background-color: #EFF5FF;
        border-radius: 30px;
        border: 3.5px solid #2043D5;
        top: 100%;
        left: -3px;
        right: 0;
        z-index: 99;
        overflow: scroll;
        word-wrap: break-word;
        height: auto;
        width: 565px;
        min-height: 40px;
        max-height: 300px;
    }

    /* Hide the items when the select box is closed: */
    .select-hide {
        display: none;
    }

    .select-items div:hover, .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 30px;
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

<script>
    const optionsCourses = {
        cea: [
            "Bachelor of Science in Mechanical Engineering", 
            "Bachelor of Science in Civil Engineering", 
            "Bachelor of Science in Electrical Engineering",
            "Bachelor of Science in Electronics Engineering",
            "Bachelor of Science in Computer Engineering",
            "Bachelor of Science in Industrial Engineering",
            "Bachelor of Science in Instrumentation and Control Engineering",
            "Bachelor of Science in Mechatronics"
        ],
        ics: ["Bachelor of Science in Information Technology"],
        iarch: ["Bachelor of Science in Architecture"],
        cbea: [
            "Bachelor of Science in Accountancy", 
            "Bachelor of Science in Entrepreneurship",
            "Bachelor of Science in Office Administration",
            "Bachelor of Science in Business Administration Major in Operations Management",
            "Bachelor of Science in Business Administration Major in Marketing Management",
            "Bachelor of Science in Business Administration Major in Financial Management",
            "Bachelor of Science in Business Administration Major in Human Resource Management"
        ],
        ced: [
            "Bachelor of Secondary Education major in English",
            "Bachelor of Secondary Education major in Math", 
            "Bachelor of Secondary Education major in Science",
            "Bachelor of Secondary Education major in Social Studies",
            "Bachelor of Secondary Education Major in Filipino",
            "Bachelor of Technical-Vocational Teacher Education major in Animation",
            "Bachelor of Technical-Vocational Teacher Education major in Computer Hardware Servicing",
            "Bachelor of Technical-Vocational Teacher Education major in Visual Graphic Design",
            "Bachelor or Technical-Vocational Teacher Education Major in Garments Fashion and Design",
            "Bachelor or Technical-Vocational Teacher Education Major in Electronics Technology",
            "Bachelor or Technical-Vocational Teacher Education Major in Welding and Fabrications Technology"
        ],
        cas: [
            "Bachelor of Science in Psychology", 
            "Bachelor of Arts in Political Science", 
            "Bachelor of Science in Statistics",
            "Bachelor of Science in Biology",
            "Bachelor of Science in Astronomy"
        ],
        ihk: ["Bachelor of Science in Physical Education"]
    };

    function updateCourses() {
        const dept = document.getElementById("department").value;
        const itemsCourses = document.getElementById("courses");
        itemsCourses.innerHTML = '';
        
        if (dept && optionsCourses[dept]) {
            optionsCourses[dept].forEach(item => {
                const option = document.createElement("option");
                option.value = item;
                option.textContent = item;
                itemsCourses.appendChild(option);
            });
            itemsCourses.value = "<?php echo htmlspecialchars($user['Course']); ?>";
        }
    }

    // Initialize courses dropdown on page load
    document.addEventListener("DOMContentLoaded", () => {
        updateCourses();
    });
</script>
</html>
