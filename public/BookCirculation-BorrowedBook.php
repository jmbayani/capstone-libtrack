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


    <title>LibTrack</title>
</head>
<body class='poppins-regular'>
    <div class="maincontainer">

        <div class="no-select container">
            <div class="container-header">
                <h1> Borrowed Book</h1>
            </div>

            <div class="container-cards1">

                <div class="card4">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd1">
                            <div class="mb-book-container">

                                <div class="container-buttons">
                                    <button class="button-back" onclick="history.back()"><i class="bi bi-arrow-90deg-left" style="font-size:16px;"></i> Back</button>
                                    <button class="button-createpdf"><i class="bi bi-filetype-pdf"></i> Create as PDF</button>
                                    <button class="button-renewbook" onclick="openModal()">Renew Book</button>

                                    <div class="modal1" id="renewBookModal">
                                        <div class="modal-content1">
                                            <span class="close-btn1" onclick="closeModal()">&times;</span>
                                            <h2>Renew Book</h2>
                                            <p><strong>Book Title:</strong> <a class="booktitle">Book Lovers</a></p>
                                            <p><strong>Author:</strong> <a class="author">Emily Henry</a></p>
                                            <p><strong>Accession No.:</strong> <a class="accnum">PCLIB-2024-001</a></p>
                                            <p><strong>Date Borrowed:</strong> <a class="borrowdate">11/01/2024</a> at <a class="borrowtime">1:00 PM</a></p>
                                            <p><strong>Date to Return:</strong> <a class="returndate">11/02/2024</a> at <a class="returntime">1:00 PM</a></p>
                                            <p><strong>Extended Return Date:</strong> <a class="extenddate">11/03/2024</a> at <a class="extendtime">1:00 PM</a></p>
                                            <hr>
                                            <h2>Renew Book to</h2>
                                            <p><strong>Name:</strong> <a class="username">Doe, John Jana</a></p>
                                            <p><strong>Email:</strong> <a class="useremail">2021-101371@rtu.edu.ph</a></p>
                                            <button class="submit-btn1" onclick="submitForm()">Submit</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="grid-bookcirculation">

                                    <div class="borrowed-state">

                                        <div>
                                            <div class="container-firstcolumn">
                                                <span class="mb-titlelabel">Book Title</span>
                                                <div>
                                                    <span class="mb-normallabel">Book Lovers</span>
                                                </div>
                                            </div>
                                            <div class="container-firstcolumn">
                                                <span class="mb-titlelabel">Author</span>
                                                <div>
                                                    <span class="mb-normallabel">Emily Henry</span>
                                                </div>
                                            </div>
                                            <div class="container-firstcolumn">
                                                <span class="mb-titlelabel">ISBN</span>
                                                <div>
                                                    <span class="mb-normallabel">9823-42223-2</span>
                                                </div>
                                            </div>
                                            <div class="container-firstcolumn">
                                                <span class="mb-titlelabel">Accession No.</span>
                                                <div>
                                                    <span class="mb-normallabel">PCLIB-2024-001</span>
                                                </div>
                                            </div>

                                        </div>

                                        <div>
                                            <div class="container-secondcolumn">
                                                <span class="mb-titlelabel">Borrowed By</span>
                                                <div>
                                                    <span class="mb-normallabel">Doe, John Jana</span>
                                                </div>
                                            </div>
                                            <div class="container-secondcolumn">
                                                <span class="mb-titlelabel">Username</span>
                                                <div>
                                                    <span class="mb-normallabel">2021-101371</span>
                                                </div>
                                            </div>
                                            <div class="container-secondcolumn">
                                                <span class="mb-titlelabel">Email</span>
                                                <div>
                                                    <span class="mb-normallabel">2021-101371@rtu.edu.ph</span>
                                                </div>
                                            </div>
                                            <div class="container-secondcolumn">
                                                <span class="mb-titlelabel">Contact</span>
                                                <div>
                                                    <span class="mb-normallabel">01234567890</span>
                                                </div>
                                            </div>

                                        </div>

                                        <div>
                                            <div class="container-thirdcolumn">
                                                <span class="mb-titlelabel">Borrowed Date</span>
                                                <div>
                                                    <span class="mb-normallabel">11/01/2024 </span>
                                                </div>
                                            </div>
                                            <div class="container-thirdcolumn">
                                                <span class="mb-titlelabel">Date to Return</span>
                                                <div>
                                                    <span class="mb-normallabel">11/02/2024</span>
                                                </div>
                                            </div>
                                            <div class="container-thirdcolumn">
                                                <span class="mb-titlelabel">Extended Return Date</span>
                                                <div>
                                                    <span class="mb-normallabel">-</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="container-fourthcolumn">
                                                <span class="mb-titlelabel">Assigned Librarian</span>
                                                <div>
                                                    <span class="mb-normallabel">-</span>
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

    .maincontainer {
        height: 646px;
        width: 1194px;
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

        .container-cards1 > div.card4 {
            display: flex;
            height: 725px;
            width: 1000px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

    .biblio-container1 {
        height: 725px;
        width: 1000px;
        overflow: auto;
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

    .mb-book-container {
        height: 725px;
        width: 1000px;
        overflow: auto;
        border-radius: 25px;
    }

    .borrowed-state {
        display: grid;
        grid-template-columns: auto auto auto auto;
        justify-items: start;
    }

    .returned-state {
        display: grid;
        grid-template-columns: auto auto auto auto;
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

    .mb-normallabelsettled {
        font-family: poppins;
        font-size: 18px;
        font-weight: 400;
        color: #2BC666;
    }

    .mb-normallabelunsettled {
        font-family: poppins;
        font-size: 18px;
        font-weight: 400;
        color: #FF0202;
    }


    .container-firstcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        width: 240px;
    }

    .container-secondcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 0px;
        width: 240px;
    }

    .container-thirdcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 0px;
        width: 240px;
    }

    .container-fourthcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 0px;
        width: 240px;
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
        margin: 5px 0px 5px 530px;
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

    .button-renewbook {
        height: auto;
        width: auto;
        background-color: transparent;
        border: 3.5px solid #2043D5;
        border-radius: 25px;
        color: #000000;
        padding: 5px 20px;
        margin: 5px 0px 5px 10px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

        .button-renewbook:hover {
            background-color: #2043D5;
            color: white;
        }


    .container {
        display: flex;
        flex-direction: column;
        height: 700px;
        width: 90%;
        border: 10px solid #2043D5;
        border-radius: 30px 30px 0px 0px;
        margin: 25px 10px 10px 55px;
    }

    .container-header {
        background-color: #2043D5;
        color: #fff;
        width: 100%;
        border-radius: 10px 10px 0px 0px;
        text-indent: 20px;
    }



    .modal1 {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content1 {
        background: #f0f4fc;
        padding: 20px;
        border-radius: 10px;
        width: 400px;
        text-align: left;
        position: relative;
    }

    .close-btn1 {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    .submit-btn1 {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background: #4A90E2;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }
</style>
<script src="script/ManageAccounts-DropdownAction.js"></script>
<script src="script/RenewBook.js"></script>



</html>