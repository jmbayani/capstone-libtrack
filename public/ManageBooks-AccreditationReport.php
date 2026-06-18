<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" />
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
                    <div class="bd-ar-container">

                        <div class="label-mbar-container">
                            <span class="label-mbar">Select Report Duration:</span>
                            <div class="label-mbarrs-radioselections">
                                <div class="label-mbarrs-container">
                                    <input type="radio" id="year5" name="yearselection" value="5">
                                    <label class="label-mbar-rs" for="year5">5-Year Book</label><br>
                                </div>
                                <div class="label-mbarrs-container1">
                                    <input type="radio" id="year10" name="yearselection" value="10">
                                    <label class="label-mbar-rs1" for="year10">10-Year Book</label><br>
                                </div>
                            </div>
                        </div>


                        <div class="label-mbar-container1">
                            <span class="label-mbar-rs">or</span>
                        </div>

                        <div class="label-mbar-container2">
                            <span class="label-mbar">Select by Specific Year:</span>
                        </div>

                        <div class="label-mbar-container3">
                            <span class="label-mbar">Export as:</span>
                            <div class="label-mbarrs-radioselections1">
                                <div class="label-mbarrs-container">
                                    <input type="radio" id="export-rs" name="fileselection" value="pdf">
                                    <label class="label-mbar-expdf" for="file-rs">PDF</label><br>
                                </div>
                                <div class="label-mbarrs-container2">
                                    <input type="radio" id="export-rs1" name="fileselection" value="excel">
                                    <label class="label-mbar-exexcel" for="file-rs1">Excel</label><br>
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
                            <div class="button-grar-container">
                                <button class="button-generate-accrep">Generate Report</button>
                            </div>

                            <div id="time-display">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="label-mbarcon">
            <span class="label-mbar-title">Manage Book: Accreditation Report</span>
        </div>


        <div class="container-buttons">
            <button class="button-back" onclick="location.href = 'ManageBooksDashboard.php';"><i class="bi bi-arrow-90deg-left" style="font-size:16px;"></i> Back</button>
        </div>

        <form class="search-book" action="/action_page.php">
            <div class="dropdown-select">
                <div class="select">
                    <span class="selected">2025</span>
                    <div class="arrow"></div>
                </div>
                <ul class="dropdown-menu">
                    <li class="active">2025</li>
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
        </form>
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

    form.search-book input[type=text] {
        height: 23px;
        width: 500px;
        border: 3px solid #2043D5;
        border-radius: 30px 0px 0px 30px;
        padding: 11px 11px 11px 30px;
        top: 435px;
        left: 500px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    .dropdown-select {
        position: relative;
        width: 15%;
    }

    .select {
        height: 27px;
        width: 155px;
        border-radius: 15px 15px 15px 15px;
        top: 237px;
        left: -25px;
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
        width: 155px;
        height: 200px;
        overflow:auto;
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        border-radius: 15px 15px 15px 15px;
        color: black;
        margin: 15px;
        top: 355px;
        left: -40px;
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

  
    .searchlabel {
        background: none;
        border: none;
        color: black;
        font-size: 14px;
        font-family: poppins;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 90px;
        left: 215px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .searchlabel-book {
        background: none;
        border: none;
        color: black;
        font-size: 14px;
        font-family: poppins;
        font-style: normal;
        text-align: center;
        margin: 0;
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
        top: 300px;
        left: 573px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        overflow: hidden;
        display: grid;
        grid-template-columns: auto;
        justify-content: start;
        gap: 0px;
        padding: 20px 0px 40px;
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
            height: 300px;
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
            height: 200px;
            width: 1125px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

    .biblio-container1 {
        height: 200px;
        width: 1125px;
        overflow: auto;
    }

    .biblio-container1-bd1 {
        height: 200px;
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

    .label-mbar-container {
        display: flex;
        margin-left: 60px;
    }

    .label-mbar-container1 {
        display: flex;
        margin-left: 155px;
        margin-top: 20px;
    }

    .label-mbar-container2 {
        display: flex;
        margin-left: 60px;
        margin-top: 20px;
    }

    .label-mbar-container3 {
        display: flex;
        margin-left: 60px;
        margin-top: 60px;
    }

    .label-mbarrs-radioselections {
        display: flex;
        align-items: center;
        margin-left: 60px;
    }

    .label-mbarrs-radioselections1 {
        display: flex;
        align-items: center;
        margin-left: 195px;
    }

    .label-mbarrs-container {
        display: flex;
        align-items: center;
    }

    .label-mbarrs-container1 {
        display: flex;
        align-items: center;
        margin-left: 60px;
    }

    .label-mbarrs-container2 {
        display: flex;
        align-items: center;
        margin-left: 138px;
    }

    [type="radio"] {
        height: 17px;
        width: 17px;
    }

    .label-mbar {
        font-family: poppins;
        font-size: 20px;
        font-weight: 600;
    }

    .label-mbar-rs {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left:10px;
    }

    .label-mbar-rs1 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 10px;
    }

    .button-grar-container {
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

    .label-mbarcon {
        position: absolute;
        top: 12px;
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
        margin: 15px 10px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

</style>
<script src="script/dropdownSearch.js"></script>

<script src="script/DateTImeMDYHMS.js"></script>
</html>