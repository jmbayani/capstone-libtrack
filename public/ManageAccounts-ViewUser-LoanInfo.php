<?php
session_start();
include "db-connect.php";

if (isset($_GET['accession_number'])) {
    $acNumber = $_GET['accession_number'];

    $sql = "
    SELECT
        bi.Book_Title,
        bi.Author,
        bi.ISBN,
        bc.Accession_Number,
        bc.Borrowed_Date,
        bc.Returned_Date
    FROM
        book_circulation bc
    JOIN
        book_info bi ON bi.Accession_Number = bc.Accession_Number
    WHERE
        bc.Accession_Number = ?;
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $acNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables or use the $row array directly
        $_SESSION['book_title'] = $row['Book_Title'];
        $_SESSION['author'] = $row['Author'];
        $_SESSION['isbn'] = $row['ISBN'];
        $_SESSION['accession_number'] = $row['Accession_Number'];
        $_SESSION['borrowed_date'] = $row['Borrowed_Date'];
        $_SESSION['returned_date'] = $row['Returned_Date'];

    }
}
?>
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


        <div class="container-cards1">

            <div class="card4">
                <div class="biblio-container1">
                    <div class="biblio-container1-bd1">
                        <div class="mb-book-container">

                            <div class="container-buttons">
                                <button class="button-back" onclick="history.back()"><i class="bi bi-arrow-90deg-left" style="font-size:16px;"></i> Back</button>
                                <button class="button-createpdf"><i class="bi bi-filetype-pdf"></i> Create as PDF</button>
                                <div class="dropdown" style="margin-left: 20px;">
                                    <button class="dropdown-button" onclick="toggleDropdown()"><i class="bi bi-gear-fill"></i> Action ▼</button>
                                    <div class="dropdown-content" id="dropdownMenu">
                                        <a href="#" style="cursor:pointer;" onclick="openModal()">Renew Book</a>
                                        <a href="#" style="cursor:pointer;" onclick="openPenaltyModal()">Apply Penalty</a>
                                    </div>
                                </div>

                                <div class="modal1" id="renewBookModal">
                                    <div class="modal-content1">
                                        <span class="close-btn1" onclick="closeModal()">&times;</span>
                                        <h2>Renew Book</h2>
                                        <p><strong>Book Title:</strong> <a class="booktitle"></a><?= htmlspecialchars($_SESSION['book_title'])?></p>
                                        <p><strong>Author:</strong> <a class="author"><?= htmlspecialchars($_SESSION['author'])?></a></p>
                                        <p><strong>Accession No.:</strong> <a class="accnum"><?= htmlspecialchars($_SESSION['accession_number'])?></a></p>
                                        <p><strong>Date Borrowed:</strong> <a class="borrowdate"><?= htmlspecialchars($_SESSION['borrowed_date'])?> at <a class="borrowtime">1:00 PM</a></p>
                                        <p><strong>Date to Return:</strong> <a class="returndate"><?= htmlspecialchars($_SESSION['returned_date'])?></a> at <a class="returntime">1:00 PM</a></p>
                                        <p><strong>Extended Return Date:</strong> <a class="extenddate">12/13/2024</a> at <a class="extendtime">11:40 PM</a></p>
                                        <hr>
                                        <h2>Renew Book to</h2>
                                        <p><strong>Name:</strong> <a class="username">Doe, John Jana</a></p>
                                        <p><strong>Email:</strong> <a class="useremail">2021-101371@rtu.edu.ph</a></p>
                                        <button class="submit-btn" onclick="submitForm()">Submit</button>
                                    </div>
                                </div>



                                <div class="modal" id="penaltyModal">
                                    <div class="modal-content">
                                        <span class="close-btn" onclick="closePenaltyModal()">&times;</span>
                                        <h2>Apply Penalty</h2>
                                        <p><strong>Name:</strong> Doe, John Jana</p>
                                        <p><strong>Email:</strong> 2021-101371@rtu.edu.ph</p>
                                        <p><strong>Book Title:</strong> Anxious People</p>
                                        <p><strong>Accession No.:</strong> PCLIB-2024-503</p>
                                        <hr>
                                        <label for="reason">Reason</label>
                                        <select class="selectp" id="reason">
                                            <option value="">Select Reason</option>
                                            <option value="Overdue Book">Overdue Book</option>
                                            <option value="Damaged Pages">Damaged Pages</option>
                                            <option value="Damaged Cover">Damaged Cover</option>
                                            <option value="Lost Book">Lost Book</option>
                                            <option value="Liquid Damage">Liquid Damage</option>
                                            <option value="Others: (Please write in remarks)">Others: (Please write in remarks)</option>
                                        </select>

                                        <label for="amount">Amount</label>
                                        <input class="inputp" type="number" id="amount" placeholder="Enter the amount" required>

                                        <label for="remarks">Remarks</label>
                                        <textarea class="textareap" id="remarks" placeholder="Write a comment"></textarea>

                                        <button class="submit-btn1" onclick="submitPenalty()">Submit</button>
                                    </div>
                                </div>



                            </div>
                            <div class="grid-userinfo">
                                <div>
                                    <div class="container-booktitle">
                                        <span class="mb-titlelabel">Book Title</span>
                                        <div>
                                            <span class="mb-normallabel"><?= htmlspecialchars($_SESSION['book_title'])?></span>
                                        </div>
                                    </div>
                                    <div class="container-author">
                                        <span class="mb-titlelabel">Author</span>
                                        <div>
                                            <span class="mb-normallabel"><?= htmlspecialchars($_SESSION['author'])?></span>
                                        </div>
                                    </div>
                                    <div class="container-isbn">
                                        <span class="mb-titlelabel">ISBN</span>
                                        <div>
                                            <span class="mb-normallabel"><?= htmlspecialchars($_SESSION['isbn'])?></span>
                                        </div>
                                    </div>
                                    <div class="container-accessionnum">
                                        <span class="mb-titlelabel">Accession No.</span>
                                        <div>
                                            <span class="mb-normallabel"><?= htmlspecialchars($_SESSION['accession_number'])?></span>
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <div class="container-dateborrowed">
                                        <span class="mb-titlelabel">Date Borrowed</span>
                                        <div>
                                            <span class="mb-normallabel"><?= htmlspecialchars($_SESSION['borrowed_date'])?></span>
                                        </div>
                                    </div>
                                    <div class="container-datereturned">
                                        <span class="mb-titlelabel">Date to Returned</span>
                                        <div>
                                            <span class="mb-normallabel"><?= htmlspecialchars($_SESSION['returned_date'])?></span>
                                        </div>
                                    </div>
                                    <div class="container-extended">
                                        <span class="mb-titlelabel">Extended Return Date</span>
                                        <div>
                                            <span class="mb-normallabel">-</span>
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <div class="container-renewer">
                                        <span class="mb-titlelabel">Renewed By</span>
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
        width: 1000px;
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
        grid-template-columns: auto auto auto;
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

    .container-booktitle {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-author {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-isbn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-accessionnum {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 40px;
        width: 210px;
    }

    .container-dateborrowed {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 210px;
    }

    .container-datereturned {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 210px;
    }

    .container-extended {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 250px;
    }

    .container-renewer {
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

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-button {
        background: none;
        border: none;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        color: #333;
        padding: 5px 10px;
        margin-left: 10px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        z-index: 10;
    }

        .dropdown-content a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

            .dropdown-content a:hover {
                background: #f1f1f1;
            }

    .show {
        display: block;
    }


    .modal {
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

    .modal-content {
        background: #f0f4fc;
        padding: 20px;
        border-radius: 10px;
        width: 400px;
        text-align: left;
        position: relative;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    .submit-btn {
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
        background: #E74C3C;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    .selectp{
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none;
    }

    .inputp, .textareap {
        width: 95%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none;
    }


</style>
<script src="script/ManageAccounts-DropdownAction.js"></script>
<script src="script/RenewBook.js"></script>
<script src="script/AddPenalty.js"></script>


</html>