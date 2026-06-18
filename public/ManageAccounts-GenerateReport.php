<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>

    <title>LibTrack</title>
</head>
<body class='poppins-regular'>
    <div class="maincontainer">

        <div class="book-info">

            <div class="container-cards">

                <div class="card1">
                    <div class="bd-gr-container">

                        <div class="label-mbgr-container">
                            <span class="label-mbgr">Category:</span>
                        </div>

                        <div class="label-mbgr-container2">
                            <span class="label-mbgr">Department:</span>
                        </div>

                        <div class="label-mbgr-container2">
                            <span class="label-mbgr">Course:</span>
                        </div>

                        <div class="label-mbgr-container2">
                            <span class="label-mbgr">Select by Year:</span>
                        </div>

                        <div class="label-mbgr-container3">
                            <span class="label-mbgr">Export as:</span>
                            <div class="label-mbgrrs-radioselections1">
                                <div class="label-mbgrrs-container">
                                    <input type="radio" id="export-rs" name="fileselection" value="pdf">
                                    <label class="label-mbgr-expdf" for="file-rs">PDF</label><br>
                                </div>
                                <div class="label-mbgrrs-container2">
                                    <input type="radio" id="export-rs1" name="fileselection" value="excel">
                                    <label class="label-mbgr-exexcel" for="file-rs1">Excel</label><br>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>

            <div class="container-cards1">
                <div class="card3">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd1">
                            <div class="button-grgr-container">
                                <button class="button-generate-accrep">Generate Report</button>
                            </div>

                            <div id="time-display">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="label-mbgrcon">
            <span class="label-mbgr-title">Manage Accounts</span>
        </div>

        <div class="container-buttons">
            <button class="button-back" onclick="history.back()"><i class="bi bi-arrow-90deg-left" style="font-size:16px;"></i> Back</button>
        </div>

        <div class="search-book">
            <div class="dropdown-select">
                <div class="select">
                    <span class="selected">Department</span>
                    <div class="arrow"></div>
                </div>
                <ul class="dropdown-menu">
                    <li>College of Arts and Sciences</li>
                    <li>College of Business, Entrepreneurship and Acc.</li>
                    <li>CED: Bachelor of Secondary Education</li>
                    <li>CED: Bachelor of Technical Vocational Teach.</li>
                    <li>College of Engineering</li>
                    <li>Institute of Architecture</li>
                    <li>Institute of Computer Studies</li>
                    <li>Institute of Human Kinetics</li>
                </ul>
            </div>
        </div>

        <div class="search-book1">
            <div class="dropdown-select1">
                <div class="select1">
                    <span class="selected1">Category</span>
                    <div class="arrow1"></div>
                </div>
                <ul class="dropdown-menu1">
                    <li>All Users</li>
                    <li>Total of Students Accounts</li>
                    <li>User with loaned Books</li>
                    <li>User with Fines</li>
                    <li>User with Restrictions</li>
                </ul>
            </div>
        </div>

        <div class="search-book2">
            <div class="dropdown-select2">
                <div class="select2">
                    <span class="selected2">Course</span>
                    <div class="arrow2"></div>
                </div>
                <ul class="dropdown-menu2">
                    <li>Bachelor of Arts in Political Science</li>
                    <li>Bachelor of Science in Astronomy</li>
                    <li>Bachelor of Science in Biology</li>
                    <li>Bachelor of Science in Psychology</li>
                    <li>Bachelor of Science in Statistics</li>
                    <li>Bachelor of Science in Accountancy</li>
                    <li>Bachelor of Science in Business Administration major in Human Resource Management</li>
                    <li>Bachelor of Science in Business Administration major in Marketing Management</li>
                    <li>Bachelor of Science in Business Administration major in Operations Management</li>
                    <li>Bachelor of Science in Business Administration major in Financial Management</li>
                    <li>Bachelor of Science in Entrepreneurship</li>
                    <li>Bachelor of Science in Office Administration</li>
                    <li>Major in English</li>
                    <li>Major in Filipino</li>
                    <li>Major in Mathematics</li>
                    <li>Major in Sciences</li>
                    <li>Major in Social Studies</li>
                    <li>Major in Animation</li>
                    <li>Major in Computer System Servicing</li>
                    <li>Major in Visual Graphic Design</li>
                    <li>Major in Electronics Technology</li>
                    <li>Major in Welding and Fabrication Technology</li>
                    <li>Major in Garments and Fashion Design</li>
                    <li>Bachelor of Science in Civil Engineering</li>
                    <li>Bachelor of Science in Electrical Engineering</li>
                    <li>Bachelor of Science in Electronics Engineering</li>
                    <li>Bachelor of Science in Computer Engineering</li>
                    <li>Bachelor of Science in Industrial Engineering</li>
                    <li>Bachelor of Science in Instrumentation and Control Engineering</li>
                    <li>Bachelor of Science in Mechanical Engineering</li>
                    <li>Bachelor of Science in Mechatronics Engineering</li>
                    <li>Bachelor of Science in Architecture</li>
                    <li>Bachelor of Science in Information Technology</li>
                    <li>Bachelor of Physical Education</li>
                </ul>
            </div>
        </div>

        <div class="search-book3">
            <div class="dropdown-select3">
                <div class="select3">
                    <span class="selected3">Year</span>
                    <div class="arrow3"></div>
                </div>
                <ul class="dropdown-menu3">
                    <li class="active3">All Users</li>
                    <li>2025</li>
                    <li>2024</li>
                    <li>2023</li>
                    <li>2022</li>
                    <li>2021</li>
                    <li>2020</li>
                    <li>2019</li>
                    <li>2018</li>
                    <li>2017</li>
                    <li>2016</li>
                    <li>2015</li>
                    <li>2014</li>
                    <li>2013</li>
                    <li>2012</li>
                    <li>2011</li>
                </ul>
            </div>
        </div>

    </div>
</body>

<style>
    body {
        background-color: #EFF5FF;
        margin: 0;
        display: flex;
    }

    .no-select {
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100px;
        background-color: #2038AD;
        color: white;
        display: flex;
        align-items: center;
        padding: 0 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    .header-spaces {
        padding: 0 50px;
    }

    .sidebar {
        position: fixed;
        top: 100px;
        left: 0;
        width: 300px;
        height: calc(100% - 60px);
        background-color: #2043D5;
        color: white;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    }

    .content {
        border: none;
        margin-top: 100px;
        margin-left: 300px;
        flex: 1;
    }

    a.button-login {
        position: fixed;
        left: 1400px;
        display: inline-block;
        padding: 2px 50px;
        font-size: 16px;
        color: black;
        background-color: #EFF5FF;
        border: none;
        border-radius: 50px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

        a.button-login:hover {
            background-color: #2043D5;
            color: white;
        }

    .sidebar-menu a {
        color: white;
        text-decoration: none;
        padding: 15px 30px;
        display: block;
        cursor: pointer
    }

        .sidebar-menu a:hover {
            text-decoration: underline;
        }

    a.dropdown-sidebar-item {
        color: black;
        text-indent: 20px;
    }

        a.dropdown-sidebar-item:hover {
            text-decoration: underline;
            color: #fff;
        }

    .sidebar-menu a:hover:not(.active) {
        background-color: #2043D5;
    }

    .dropdown-select {
        position: relative;
        width: 300px;
    }

    .select {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-right: 10px;
        cursor: pointer;
    }

        .select:hover {
            display: flex;
            background-color: #2038AD;
            text-decoration: underline;
            color: #fff;
        }

    .selected:hover {
        background-color: #2038AD;
        display: block;
    }

    .arrow {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid white;
        transition: 0.3s;
    }

    .arrow-rotate {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        background-color: #f4f4f4;
        color: black;
        display: none;
        padding: 0;
        margin: 0;
        transition: 0.2s;
    }

    a.active {
        background-color: #2043D5;
        color: #fff;
    }

        a.active:hover {
            background-color: #2038AD;
            color: #fff;
        }

    .menu-open {
        display: block;
        opacity: 1;
    }

    .dropdown-select1 {
        position: relative;
        width: 300px;
    }

    .select1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-right: 10px;
        cursor: pointer;
    }

        .select1:hover {
            display: flex;
            background-color: #2038AD;
            text-decoration: underline;
            color: #fff;
        }

    .selected1:hover {
        background-color: #2038AD;
        display: block;
    }

    .arrow1 {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid white;
        transition: 0.3s;
    }

    .arrow-rotate1 {
        transform: rotate(180deg);
    }

    .dropdown-menu1 {
        background-color: #f4f4f4;
        color: black;
        display: none;
        padding: 0;
        margin: 0;
        transition: 0.2s;
    }

    a.active1 {
        background-color: #2043D5;
        color: #fff;
    }

        a.active1:hover {
            background-color: #2038AD;
            color: #fff;
        }

    .menu-open1 {
        display: block;
        opacity: 1;
    }



    .maincontainer {
        height: 646px;
        width: 1194px;
        margin: 0;
        position: relative;
        top: 0px;
        left: 0px;
        background-color: #EFF5FF;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .search-book {
        display: flex;
        flex-direction: column;
        align-items: center;
    }


    .dropdown-select {
        position: relative;
        width: 15%;
    }

    .select {
        height: 27px;
        width: 400px;
        border-radius: 15px 15px 15px 15px;
        top: 215px;
        left: 15px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        border: 3px solid #2043D5;
        padding: 9px;
        cursor: pointer;
        transition: 0.3s;
    }

    .select-clicked {
        border-radius: 15px 15px 15px 15px;
        border: 3px solid #2043D5;
    }

    .arrow {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid black;
        transition: 0.3s;
    }

    .arrow-rotate {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        width: 400px;
        height: 200px;
        overflow: auto;
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        border-radius: 15px 15px 15px 15px;
        color: black;
        margin: 15px;
        top: 334px;
        left: 1px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: none;
        transition: 0.2s;
        z-index: 1;
    }

        .dropdown-menu li {
            padding: 8px 16px;
            cursor: pointer;
        }

            .dropdown-menu li:hover {
                background-color: #2043D5;
                color: #fff;
                border-radius: 30px;
            }

    .active {
        background-color: #2043D5;
        color: #fff;
        border-radius: 30px;
    }

    .menu-open {
        display: block;
        opacity: 1;
    }

    .dropdown-select1 {
        position: relative;
        width: 15%;
    }

    .select1 {
        height: 27px;
        width: 320px;
        border-radius: 15px 15px 15px 15px;
        top: 146px;
        left: 477px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        border: 3px solid #2043D5;
        padding: 9px;
        cursor: pointer;
        transition: 0.3s;
    }

    .select-clicked1 {
        border-radius: 15px 15px 15px 15px;
        border: 3px solid #2043D5;
    }

    .arrow1 {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid black;
        transition: 0.3s;
    }

    .arrow-rotate1 {
        transform: rotate(180deg);
    }

    .dropdown-menu1 {
        width: 320px;
        height: 200px;
        overflow: auto;
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        border-radius: 15px 15px 15px 15px;
        color: black;
        margin: 15px;
        top: 265px;
        left: 463px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: none;
        transition: 0.2s;
        z-index: 1;
    }

        .dropdown-menu1 li {
            padding: 8px 16px;
            cursor: pointer;
        }

            .dropdown-menu1 li:hover {
                background-color: #2043D5;
                color: #fff;
                border-radius: 30px;
            }

    .active1 {
        background-color: #2043D5;
        color: #fff;
        border-radius: 30px;
    }

    .menu-open1 {
        display: block;
        opacity: 1;
    }

    .book-info {
        height: auto;
        width: 1126px;
        border-radius: 25px;
        border-width: 60px 10px 10px 10px;
        border-style: solid;
        border-color: #2043D5;
        background-color: transparent;
        position: absolute;
        top: 315px;
        left: 573px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        overflow: hidden;
        display: grid;
        grid-template-columns: auto;
        justify-content: start;
        gap: 0px;
        padding: 40px 0px 40px;
        margin: 20px 20px;
    }

    .container-cards {
        height: auto;
        width: 1125px;
        overflow: hidden;
        display: grid;
        grid-template-columns: 240px;
        gap: 0px;
        padding: 0px;
        align-content: baseline;
    }

        .container-cards > div.card1 {
            height: 336px;
            width: 1125px;
            background-color: transparent;
            flex: 1;
            flex-direction: column;
            overflow: hidden;
            display: flex;
            align-items: start;
            justify-content: space-evenly;
        }

        .container-cards > div.card2 {
            height: auto;
            width: 1125px;
            background-color: transparent;
            flex: 1;
            flex-direction: column;
            overflow: hidden;
            display: flex;
        }

    .container-cards1 {
        height: auto;
        width: 1125px;
        overflow: hidden;
        display: grid;
        grid-template-columns: 810px;
        gap: 0px;
        padding: 0px;
        align-content: baseline;
    }

        .container-cards1 > div.card3 {
            display: flex;
            height: 150px;
            width: 1125px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

    .biblio-container1 {
        height: 150px;
        width: 1125px;
        overflow: auto;
    }

    .biblio-container1-bd1 {
        height: 150px;
        width: 1125px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-end;
    }

    .hrstyle {
        width: 1095px;
        margin: 2px 16px;
        height: 1.5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;
    }

    .label-mbgr-container {
        display: flex;
        margin-left: 60px;
        margin-bottom: 40px;
    }

    .label-mbgr-container1 {
        display: flex;
        margin-left: 155px;
        margin-top: 20px;
    }

    .label-mbgr-container2 {
        display: flex;
        margin-left: 60px;
        margin-top: 40px;
    }

    .label-mbgr-container3 {
        display: flex;
        margin-left: 60px;
        margin-top: 40px;
    }

    .label-mbgrrs-radioselections {
        display: flex;
        align-items: center;
        margin-left: 60px;
    }

    .label-mbgrrs-radioselections1 {
        display: flex;
        align-items: center;
        margin-left: 195px;
    }

    .label-mbgrrs-container {
        display: flex;
        align-items: center;
    }

    .label-mbgrrs-container1 {
        display: flex;
        align-items: center;
        margin-left: 60px;
    }

    .label-mbgrrs-container2 {
        display: flex;
        align-items: center;
        margin-left: 138px;
    }

    [type="radio"] {
        height: 17px;
        width: 17px;
    }

    .label-mbgr {
        font-family: poppins;
        font-size: 20px;
        font-weight: 600;
    }

    .label-mbgr-rs {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 10px;
    }

    .label-mbgr-rs1 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 10px;
    }

    .button-grgr-container {
        margin: 10px 40px;
    }

    .button-generate-accrep {
        height: auto;
        width: auto;
        background-color: transparent;
        border-radius: 15px;
        border: 2px solid #2043D5;
        color: #2043D5;
        padding: 10px 20px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
    }

        .button-generate-accrep:hover {
            background-color: #2043D5;
            color: white;
        }

    #time-display {
        color: black;
        font-size: 16px;
        font-family: poppins;
        font-weight: 600;
        margin-right: 35px;
    }

    .label-mbgrcon {
        position: absolute;
        top: 24px;
        left: 60px;
        font-size: 32px;
        font-family: poppins;
        font-weight: 600;
        color: white;
    }

    .container-buttons {
        position: absolute;
        margin-left: 55px;
        margin-top: 65px;
    }

    .button-back {
        height: auto;
        width: auto;
        background-color: transparent;
        border: none;
        color: #000000;
        padding: 0px 0px;
        margin: 25px 10px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }



    .dropdown-select2 {
        position: relative;
        width: 300px;
    }

    .select2 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-right: 20px;
        cursor: pointer;
    }

        .select2:hover {
            display: flex;
            background-color: #2038AD;
            text-decoration: underline;
            color: #fff;
        }

    .selected2:hover {
        background-color: #2038AD;
        display: block;
    }

    .arrow2 {
        width: 0;
        height: 0;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        border-top: 20px solid white;
        transition: 0.3s;
    }

    .arrow-rotate2 {
        transform: rotate(280deg);
    }

    .dropdown-menu2 {
        background-color: #f4f4f4;
        color: black;
        display: none;
        padding: 0;
        margin: 0;
        transition: 0.2s;
    }

    a.active2 {
        background-color: #2043D5;
        color: #fff;
    }

        a.active2:hover {
            background-color: #2038AD;
            color: #fff;
        }

    .menu-open2 {
        display: block;
        opacity: 2;
    }

    .dropdown-select2 {
        position: relative;
        width: 25%;
    }

    .select2 {
        height: 27px;
        width: 700px;
        border-radius: 15px 15px 15px 15px;
        top: 280px;
        left: 667px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        border: 3px solid #2043D5;
        padding: 9px;
        cursor: pointer;
        transition: 0.3s;
    }

    .select-clicked2 {
        border-radius: 15px 15px 15px 15px;
        border: 3px solid #2043D5;
    }

    .arrow2 {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid black;
        transition: 0.3s;
    }

    .arrow-rotate2 {
        transform: rotate(280deg);
    }

    .dropdown-menu2 {
        width: 700px;
        height: 200px;
        overflow: auto;
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 2em rgba(0, 0, 0, 0.2);
        border-radius: 25px 25px 25px 25px;
        color: black;
        margin: 25px;
        top: 388px;
        left: 642px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: none;
        transition: 0.2s;
        z-index: 2;
    }

        .dropdown-menu2 li {
            padding: 8px 26px;
            cursor: pointer;
        }

            .dropdown-menu2 li:hover {
                background-color: #2043D5;
                color: #fff;
                border-radius: 30px;
            }

    .active2 {
        background-color: #2043D5;
        color: #fff;
        border-radius: 30px;
    }

    .menu-open2 {
        display: block;
        opacity: 2;
    }



    .dropdown-select3 {
    position: relative;
    width: 300px;
}

.select3 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-right: 30px;
    cursor: pointer;
}

    .select3:hover {
        display: flex;
        background-color: #3038AD;
        text-decoration: underline;
        color: #fff;
    }

.selected3:hover {
    background-color: #3038AD;
    display: block;
}

.arrow3 {
    width: 0;
    height: 0;
    border-left: 30px solid transparent;
    border-right: 30px solid transparent;
    border-top: 30px solid white;
    transition: 0.3s;
}

.arrow-rotate3 {
    transform: rotate(380deg);
}

.dropdown-menu3 {
    background-color: #f4f4f4;
    color: black;
    display: none;
    padding: 0;
    margin: 0;
    transition: 0.3s;
}

a.active3 {
    background-color: #3043D5;
    color: #fff;
}

    a.active3:hover {
        background-color: #3038AD;
        color: #fff;
    }

.menu-open3 {
    display: block;
    opacity: 3;
}

.dropdown-select3 {
    position: relative;
    width: 35%;
}

    .select3 {
        height: 27px;
        width: 320px;
        border-radius: 15px 15px 15px 15px;
        top: 346px;
        left: 477px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        border: 3px solid #3043D5;
        padding: 9px;
        cursor: pointer;
        transition: 0.3s;
    }

    .select-clicked3 {
        border-radius: 15px 15px 15px 15px;
        border: 3px solid #3043D5;
    }

.arrow3 {
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 6px solid black;
    transition: 0.3s;
}

.arrow-rotate3 {
    transform: rotate(380deg);
}

    .dropdown-menu3 {
        width: 320px;
        height: 300px;
        overflow: auto;
        list-style: none;
        padding: 0.3em 0.5em;
        background-color: #fff;
        border: 3px solid #3043D5;
        box-shadow: 0 0.5em 3em rgba(0, 0, 0, 0.3);
        border-radius: 35px 35px 35px 35px;
        color: black;
        margin: 35px;
        top: 497px;
        left: 442px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: none;
        transition: 0.3s;
        z-index: 3;
    }

    .dropdown-menu3 li {
        padding: 8px 36px;
        cursor: pointer;
    }

        .dropdown-menu3 li:hover {
            background-color: #3043D5;
            color: #fff;
            border-radius: 30px;
        }

.active3 {
    background-color: #3043D5;
    color: #fff;
    border-radius: 30px;
}

.menu-open3 {
    display: block;
    opacity: 3;
}
</style>
<script src="script/dropdownSearch.js"></script>

<script src="script/DateTImeMDYHMS.js"></script>
</html>