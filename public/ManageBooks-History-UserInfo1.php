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


    <title>Search Result Book Selected</title>
</head>
<body class='poppins-regular'>
    <div class="maincontainer">
        <div class="book-info">
            <div class="container-cards">
                <div class="card1">
                    <div class="card1-pic">
                        <img src="C:\Users\kian\Downloads\image 5.png" width="200" height="330">
                    </div>

                    <div class="card1-details">

                        <div class="user-rating">
                            <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                            <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                            <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                            <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                            <label class="rating-label">4.0 (100 ratings)</label>
                        </div>

                    </div>
                </div>
                <div class="card2">
                    <button class="button-details"><i class="bi bi-journal" style="font-size:16px;"></i> Details</button>
                    <button class="button-details"><i class="bi bi-folder" style="font-size:16px;"></i> All Copies</button>
                    <button class="button-details"><i class="bi bi-chat-left-text"></i> Reviews</button>
                    <button class="button-details"><i class="bi bi-info-circle"></i> More Info</button>
                    <button class="button-details"><i class="bi bi-clock-history"></i> History</button>
                </div>
            </div>

            <div class="bi-label">
                <span>History</span>
            </div>

            <div class="container-cards1">

                <div class="card4">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd1">
                            <div class="mb-book-container">

                                <div class="container-buttons">
                                    <button class="button-back"><i class="bi bi-arrow-90deg-left" style="font-size:16px;"></i> Back</button>
                                    <button class="button-createpdf"><i class="bi bi-filetype-pdf"></i> Create as PDF</button>
                                </div>
                                <div class="grid-userinfo">
                                    <div>
                                        <div class="container-accession">
                                            <span class="mb-titlelabel">Accession no.</span>
                                            <div>
                                                <span class="mb-normallabel">PCLIB-2024-732</span>
                                            </div>
                                        </div>
                                        <div class="container-dewey">
                                            <span class="mb-titlelabel">Dewey Code</span>
                                            <div>
                                                <span class="mb-normallabel">658.442 - 2015 C.2</span>
                                            </div>
                                        </div>
                                        <div class="container-shelfloc">
                                            <span class="mb-titlelabel">Shelf Location</span>
                                            <div>
                                                <span class="mb-normallabel">Periodical Section</span>
                                            </div>
                                        </div>
                                        <div class="container-condition">
                                            <span class="mb-titlelabel">Condition</span>
                                            <div>
                                                <span class="mb-normallabel">Good</span>
                                            </div>
                                        </div>
                                        <div class="container-datereturned">
                                            <span class="mb-titlelabel">Date Returned</span>
                                            <div>
                                                <span class="mb-normallabel">12/14/2024</span>
                                            </div>
                                        </div>
                                        <div class="container-timereturned">
                                            <span class="mb-titlelabel">Time</span>
                                            <div>
                                                <span class="mb-normallabel">01:23:42 PM</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="container-returnedby">
                                            <span class="mb-titlelabel">Returned By</span>
                                            <div>
                                                <span class="mb-normallabelwc">Jennie Dela Cruz</span>
                                            </div>
                                        </div>
                                        <div class="container-username">
                                            <span class="mb-titlelabel">Username</span>
                                            <div>
                                                <span class="mb-normallabelwc">2021-123345</span>
                                            </div>
                                        </div>
                                        <div class="container-email">
                                            <span class="mb-titlelabel">Email</span>
                                            <div>
                                                <span class="mb-normallabelwc">2021-123345@rtu.edu.ph</span>
                                            </div>
                                        </div>
                                        <div class="container-contact">
                                            <span class="mb-titlelabel">Contact</span>
                                            <div>
                                                <span class="mb-normallabel">09123456789</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
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


    .maincontainer {
        height: 646px;
        width: 1194px;
        margin: 0;
        position: relative;
        top: 0px;
        left: 0px;
        background-color: #EFF5FF;
        overflow: auto;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .book-info {
        height: auto;
        width: 1125px;
        border-radius: 50px;
        background-color: #EFF5FF;
        border: 15px solid #2043D5;
        position: absolute;
        top: 485px;
        left: 573px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        overflow: hidden;
        display: grid;
        grid-template-columns: auto auto;
        justify-content: start;
        gap: 20px;
        padding: 50px 0px 100px;
        margin: 20px 20px;
    }

    .container-cards {
        height: 800px;
        width: auto;
        overflow: hidden;
        display: grid;
        grid-template-columns: 240px;
        gap: 38px;
        padding: 0px;
        margin-left: 40px;
        align-content: baseline;
    }

        .container-cards > div.card1 {
            height: 370px;
            width: 180px;
            background-color: #EFF5FF;
            padding: 20px 20px;
            flex: 1;
            flex-direction: column;
            overflow: hidden;
            justify-content: space-between;
            display: flex;
            align-items: center;
        }

        .container-cards > div.card2 {
            height: auto;
            width: 220px;
            border: 4.5px solid #2043D5;
            border-radius: 25px;
            background-color: #EFF5FF;
            flex: 1;
            flex-direction: column;
            overflow: hidden;
            display: flex;
        }

    .container-cards1 {
        height: auto;
        width: auto;
        overflow: hidden;
        display: grid;
        grid-template-columns: 810px;
        gap: 20px;
        padding: 0px;
        align-content: baseline;
        margin-top: 20px;
        margin-left: 20px;
    }

        .container-cards1 > div.card3 {
            display: flex;
            height: 130px;
            width: 750px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

        .container-cards1 > div.card4 {
            display: flex;
            height: 725px;
            width: 750px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

    .details-tl-bg {
        width: auto;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }

    .biblio-container1 {
        height: 725px;
        width: 750px;
        overflow: auto;
    }

    .biblio-container1-bl {
        height: 330px;
        width: 530px;
        background-color: #2043D5;
        overflow-y: hidden;
        overflow-x: auto;
    }

    .biblio-container2 {
        height: 380px;
        width: 500px;
        padding-left: 15px;
        overflow: visible;
    }

    .bi-label {
        position: absolute;
        margin-left: 340px;
        margin-top: 40px;
        font-family: poppins;
        font-size: 20px;
        font-weight: 700;
    }

    .card1-pic {
        height: 330px;
        width: 200px;
        border: 1px solid #2043D5;
        border-radius: 25px;
        overflow: hidden;
    }

    .card1-details {
        height: auto;
        width: auto;
        overflow: auto;
        justify-content: space-evenly;
    }

    .header1 {
        font-family: "Linden Hill", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 35px;
        padding: 0px;
        margin: 0px;
    }

    .header2 {
        font-family: "Linden Hill", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 20px;
        padding: 0px;
        margin: 0px;
    }

    .rating-checked {
        color: orange;
    }

    .rating-label {
        font-family: "Libre Franklin", sans-serif;
        font-weight: 400;
        font-style: normal;
        font-size: 12px;
    }

    .button-details {
        height: 56px;
        width: inherit;
        background-color: #FFFFFF;
        border: none;
        color: #000000;
        padding: 15px 32px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 17px;
        font-weight: 600;
        cursor: pointer;
    }

        .button-details:hover {
            background-color: #2043D5;
            color: #FFFFFF;
        }

    .biblio-container1-bd {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    .biblio-container1-bd1 {
        height: 725px;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .mb-label {
        width: 750px;
        height: 50px;
        display: flex;
        flex-direction: row;
        background-color: #2043D5;
        border-radius: 25px 25px 0px 0px;
        align-items: center;
        color: white;
    }

    .label-mb-label {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 49px;
    }

    .label-mb-label1 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 145px;
    }

    .label-mb-label2 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 143px;
    }

    .label-mb-label3 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 115px;
    }

    .label-mb-date {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        width: 100px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .label-mb-time {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        width: 95px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .label-mb-name {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        width: 130px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .label-mb-transactiontype {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        width: 95px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .mb-book-container {
        height: 725px;
        width: 743px;
        border: 4px solid #2043D5;
        overflow: auto;
        border-radius: 25px;
    }

    .mb-label-books {
        width: 741px;
        height: auto;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
    }

    .hrstyle {
        width: 710px;
        margin: 2px 16px;
        height: 1.5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;
    }

    .grid-userinfo {
        display: grid;
        grid-template-columns: auto auto;
        justify-items: start;
    }

    .mb-titlelabel {
        font-family: poppins;
        font-size: 22px;
        font-weight: 600;
    }

    .mb-normallabel {
        font-family: poppins;
        font-size: 18px;
        font-weight: 400;
    }

    .mb-normallabelwc {
        font-family: poppins;
        font-size: 18px;
        font-weight: 400;
        color: #2043D5;
        cursor: pointer;
    }

    .container-accession {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-dewey {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-shelfloc {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-condition {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-datereturned {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-timereturned {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-returnedby {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 210px;
    }

    .container-username {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 210px;
    }

    .container-email {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 210px;
    }

    .container-contact {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 210px;
    }

    .container-buttons {
        margin-left: 20px;
        margin-top: 5px;
    }

    .button-back {
        height: auto;
        width: auto;
        background-color: transparent;
        border: none;
        color: #000000;
        padding: 0px 0px;
        margin: 5px 10px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

    .button-createpdf {
        height: auto;
        width: auto;
        background-color: transparent;
        border: 3.5px solid #2043D5;
        border-radius: 25px;
        color: #000000;
        padding: 5px 20px;
        margin: 5px 0px 5px 410px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

        .button-createpdf:hover {
            background-color: #2043D5;
            color: white;
        }
</style>

</html>