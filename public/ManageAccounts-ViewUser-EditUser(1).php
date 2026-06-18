<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>LibTrack</title>
</head>
<body>

    <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <h2 class="header-signup">Edit User</h2>
        <div class="container-info">
            <form action=".php">
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
                    <input type="text" id="iemail" name="iemail" placeholder="Enter your institutional email &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;@rtu.edu.ph" pattern=".+@rtu.edu.ph" title="Email Address must end with @rtu.edu.ph" required>

                    <label for="department">Department</label><br>

                    <div class="custom-select" required>
                        <select required>
                            <option value="">Select your department</option>
                            <option value="DEP1">College of Arts and Sciences</option>
                            <option value="DEP2">College of Business, Entrepreneurship and Accountancy</option>
                            <option value="DEP3">College of Education: Bachelor of Secondary Education</option>
                            <option value="DEP4">College of Education: Bachelor of Technical - Vocational Teacher Education</option>
                            <option value="DEP5">College of Engineering</option>
                            <option value="DEP6">Institute of Architecture</option>
                            <option value="DEP7">Institute of Computer Studies</option>
                            <option value="DEP8">Institute of Human Kinetics</option>
                        </select>
                    </div>

                    <label for="course">Course</label><br>

                    <div class="custom-select">
                        <select required>
                            <option value="">Select your course</option>
                            <option value="CRS1">Bachelor of Arts in Political Science</option>
                            <option value="CRS2">Bachelor of Science in Astronomy</option>
                            <option value="CRS3">Bachelor of Science in Biology</option>
                            <option value="CRS4">Bachelor of Science in Psychology</option>
                            <option value="CRS5">Bachelor of Science in Statistics</option>
                            <option value="CRS6">Bachelor of Science in Accountancy</option>
                            <option value="CRS7">Bachelor of Science in Business Administration major in Human Resource Management</option>
                            <option value="CRS8">Bachelor of Science in Business Administration major in Marketing Management</option>
                            <option value="CRS9">Bachelor of Science in Business Administration major in Operations Management</option>
                            <option value="CRS10">Bachelor of Science in Business Administration major in Financial Management</option>
                            <option value="CRS11">Bachelor of Science in Entrepreneurship</option>
                            <option value="CRS12">Bachelor of Science in Office Administration</option>
                            <option value="CRS13">Major in English</option>
                            <option value="CRS14">Major in Filipino</option>
                            <option value="CRS15">Major in Mathematics</option>
                            <option value="CRS16">Major in Sciences</option>
                            <option value="CRS17">Major in Social Studies</option>
                            <option value="CRS18">Major in Animation</option>
                            <option value="CRS19">Major in Computer System Servicing</option>
                            <option value="CRS20">Major in Visual Graphic Design</option>
                            <option value="CRS21">Major in Electronics Technology</option>
                            <option value="CRS22">Major in Welding and Fabrication Technology</option>
                            <option value="CRS23">Major in Garments and Fashion Design</option>
                            <option value="CRS24">Bachelor of Science in Civil Engineering</option>
                            <option value="CRS25">Bachelor of Science in Electrical Engineering</option>
                            <option value="CRS26">Bachelor of Science in Electronics Engineering</option>
                            <option value="CRS27">Bachelor of Science in Computer Engineering</option>
                            <option value="CRS28">Bachelor of Science in Industrial Engineering</option>
                            <option value="CRS29">Bachelor of Science in Instrumentation and Control Engineering</option>
                            <option value="CRS30">Bachelor of Science in Mechanical Engineering</option>
                            <option value="CRS31">Bachelor of Science in Mechatronics Engineering</option>
                            <option value="CRS32">Bachelor of Science in Architecture</option>
                            <option value="CRS33">Bachelor of Science in Information Technology</option>
                            <option value="CRS34">Bachelor of Physical Education</option>
                        </select>
                    </div>

                    <label for="campus">Campus</label><br>

                    <div class="custom-select">
                        <select required>
                            <option value="">Select your campus/branch</option>
                            <option value="CMP1">Boni</option>
                            <option value="CMP2">Pasig</option>
                        </select>
                    </div>

                    <h2 class="header1-signup">LibTrack Account</h2>

                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required><br>
                   
                   
                    <button type="submit" class="editaccount-btn" onclick="location.href = 'ManageAccounts-ViewUser.html';">Update</button>

                   
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

    input[type=text] {
        width: 560px;
        height: 40px;
        border: 3.5px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }

    input[type=number] {
        width: 560px;
        height: 40px;
        border: 3.5px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }

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
    .custom-select {
        height: 40px;
        width: 565px;
        position: relative;
        font-family: poppins;
        background-color: #EFF5FF;
        border: 3.5px solid;
        border-radius: 30px;
        font-size: 16px;
        margin-bottom: 10px;
    }

        .custom-select select {
            display: none; 
        }

    .select-selected {
        border-radius: 30px;
        border: 3.5px solid #2043D5;
    }

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

        .select-selected.select-arrow-active:after {
            border-color: transparent transparent black transparent;
            top: 7px;
        }

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

    .editaccount-btn {
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

        .editaccount-btn:hover {
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
var x, i, j, l, ll, selElmnt, a, b, c;

x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
       
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
     
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
 
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

    document.addEventListener("click", closeAllSelect);


   
    var password = document.getElementById('password');
    var toggler = document.getElementById('toggler');
    showHidePassword = () => {
        if (password.type == 'password') {
            password.setAttribute('type', 'text');
            toggler.classList.add('fa-eye-slash');
        } else {
            toggler.classList.remove('fa-eye-slash');
            password.setAttribute('type', 'password');
        }
    };
    toggler.addEventListener('click', showHidePassword);

  
    var confirmpassword = document.getElementById('confirmpassword');
    var toggler1 = document.getElementById('toggler1');
    showHideConfirmPassword = () => {
        if (confirmpassword.type == 'password') {
            confirmpassword.setAttribute('type', 'text');
            toggler1.classList.add('fa-eye-slash');
        } else {
            toggler1.classList.remove('fa-eye-slash');
            confirmpassword.setAttribute('type', 'password');
        }
    };
    toggler1.addEventListener('click', showHideConfirmPassword);


</script>
</html>
