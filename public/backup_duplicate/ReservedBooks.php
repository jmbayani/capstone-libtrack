<?php
include 'db-connect.php';

$sql = "
    SELECT 
        br.Reserve_ID,
        br.User_Email,
        ui.Contact_No,
        br.Reserved_Date,
        br.Status,
        br.Accession_Number,
        br.Reserved_By,
        br.Total_Copies,
        br.Ready_Date,
        br.User_Notes,
        br.Librarian_Notes,
        bi.Book_Title,
        bi.Author,
        bi.ISBN,
        bi.Shelf_Location
    FROM 
        book_reservation br
    JOIN 
        book_info bi ON br.Accession_Number = bi.Accession_Number
    JOIN 
        user_info ui ON ui.Institutional_Email = br.User_Email
";

$result = $conn->query($sql);

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
    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>

    <title>LibTrack</title>
</head>
<body class='poppins-regular'>
    <div class="maincontainer">
        <div class="book-info">
            <div class="container-cards">
                <div class="card1">
                    <div class="cards-bdetails">
                        <div class="container-bdcardcon1">
                            <div>
                                <h1 class="label-managefines">Reserved Books</h1>
                            </div>
                            <div class="container-sddb">

                                <div class="container-searchbarfilter">
                                    <input class="input-searchbar" type="text" id="search" placeholder="Search">
                                    <select class="dropdown-searchfilter" id="filter">
                                        <option>Name</option>
                                        <option>Author</option>
                                        <option>Category</option>
                                    </select>
                                </div>

                                <div class="container-startenddate">
                                    <label class="label-startdate">Start Date</label>
                                    <input class="date-startdate" type="date" id="start-date">
                                    <label class="label-enddate">End Date</label>
                                    <input class="date-enddate" type="date" id="end-date">
                                </div>


                                <div class="container-generatebtn">
                                    <div class="form-group3">
                                        <input class="radio-pending" type="radio" name="sort-pending" id="pending" value="pending">
                                        <span class="label-normal1">Pending</span>
                                        <input class="radio-ready" type="radio" name="sort-ready" id="ready" value="ready">
                                        <span class="label-normal1">Ready</span>
                                    </div>

                                    <button class="generate-btn" onclick="location.href='ReservedBooks-GenerateReport.php'">Generate Report</button>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="container-cards1">
                    <div class="card3">
                        <div class="biblio-container1">
                            <div class="biblio-container1-bd1">
                                <div class="mb-label">
                                </div>
                                <div class="mb-book-container">

                                    <div class="grid-bookcirculation">
                                    <?php if ($result->num_rows > 0): ?>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                        <div class="ready-state">

                                            <div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">Book Title:</span>
                                                    <div>
                                                        <span class="mb-normallabelwc" onclick="location.href = 'ReservedBooks-Ready.php';"><?= htmlspecialchars($row['Book_Title'])?></span>
                                                    </div>
                                                </div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">Author:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['Author'])?></span>
                                                    </div>
                                                </div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">ISBN:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['ISBN'])?></span>
                                                    </div>
                                                </div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">Subject:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['Shelf_Location'])?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="container-secondcolumn">
                                                    <span class="mb-titlelabel">Username:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['Reserved_By'])?></span>
                                                    </div>
                                                </div>
                                                <div class="container-secondcolumn">
                                                    <span class="mb-titlelabel">Email:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['User_Email'])?></span>
                                                    </div>
                                                </div>
                                                <div class="container-secondcolumn">
                                                    <span class="mb-titlelabel">Contact:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['Contact_No'])?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                            <div class="container-thirdcolumn">
                                                    <span class="mb-titlelabel">Reserve Date:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['Reserved_Date'])?></span>
                                                    </div>
                                                </div>
                                                <div class="container-thirdcolumn">
                                                    <span class="mb-titlelabel">Total Copies:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['Total_Copies'])?> Copies</span>
                                                    </div>
                                                </div>
                                                <div class="container-thirdcolumn">
                                                    <span class="mb-titlelabel">Ready Date:</span>
                                                    <div>
                                                        <?php if ($row['Ready_Date']===null): ?>
                                                            <span class="mb-normallabel">-</span>
                                                        <?php else: ?>
                                                            <span class="mb-normallabel"><?= htmlspecialchars($row['Ready_Date'])?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="container-thirdcolumn">
                                                    <span class="mb-titlelabel">Status:</span>
                                                    <div>
                                                        <?php if ($row['Status']!=='Ready'): ?>
                                                            <span class="mb-normallabelpending"><?= htmlspecialchars($row['Status'])?></span>
                                                        <?php else: ?>
                                                            <span class="mb-normallabelready"><?= htmlspecialchars($row['Status'])?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="container-fourthcolumn">
                                                    <span class="mb-titlelabel">Comments:</span>
                                                    <div>
                                                        <span class="mb-normallabel"><?= htmlspecialchars($row['User_Notes'])?></span>
                                                    </div>
                                                </div>
                                                <?php if ($row['Status']==='Ready'): ?>
                                                    <div class="container-fourthcolumn">
                                                        <span class="mb-titlelabel">Librarian Notes:</span>
                                                        <div>
                                                            <span class="mb-normallabelpending"><?= htmlspecialchars($row['Librarian_Notes'])?></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <button class="delete-btn" onclick="deleteDiv(this)"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
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
        top: 400px;
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
        border-radius: 0px 30px 30px 0px;
        top: 400px;
        left: 278px;
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
        border-radius: 0px 30px 30px 0px;
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
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        border-radius: 30px;
        color: black;
        margin: 15px;
        top: 520px;
        left: 262px;
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

    .book-info {
        height: auto;
        width: 1126px;
        background-color: transparent;
        position: absolute;
        top: 480px;
        left: 630px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        overflow: hidden;
        display: grid;
        grid-template-columns: auto;
        justify-content: start;
        gap: 30px;
        padding: 20px 0px 40px;
        margin: 0px 20px;
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
            align-items: center;
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
            height: 600px;
            width: 1125px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

    .biblio-container1 {
        height: 600px;
        width: 1125px;
        overflow: auto;
    }

    .cards-bdetails {
        flex: 1;
        flex-direction: row;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .biblio-container1-bd {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    .biblio-container1-bd1 {
        height: 600px;
        width: 1125px;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .mb-label {
        width: 1125px;
        height: 50px;
        display: flex;
        flex-direction: row;
        background-color: #2043D5;
        border-radius: 25px 25px 0px 0px;
        align-items: center;
        color: white;
    }

    .mb-book-container {
        height: 530px;
        width: 1124px;
        border: 1px solid #2043D5;
        overflow: auto;
        border-radius: 0px 0px 25px 25px;
    }

    .container-bdcardcon1 {
        height: 270px;
        width: 1100px;
        display: grid;
        grid-template-columns: auto auto;
        justify-content: space-around;
        background-color: #2043D5;
        border-radius: 25px;
        align-items: center;
    }

    .container-searchbarfilter {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 20px 20px;
    }

    .container-startenddate {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 20px 20px;
        justify-content: flex-end;
    }

    .container-generatebtn {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: flex-end;
        margin: 20px 20px;
    }

    .label-managefines {
        font-size: 40px;
        font-family: poppins;
        font-weight: 600;
        color: white;
    }

    .label-startdate {
        font-size: 18px;
        font-family: poppins;
        font-weight: 400;
        color: white;
    }

    .label-enddate {
        font-size: 18px;
        font-family: poppins;
        font-weight: 400;
        color: white;
    }

    .input-searchbar {
        width: 390px;
        padding: 10px;
        border-radius: 5px 0px 0px 5px;
        border: 2px solid #0a269d;
        font-size: 16px;
        flex-grow: 1;
    }

    .date-startdate, .date-enddate {
        padding: 10px;
        border-radius: 5px;
        border: 2px solid #0a269d;
        font-size: 16px;
        cursor: pointer;
    }

    .dropdown-searchfilter {
        width: 160px;
        padding: 10px;
        border-radius: 0px 5px 5px 0px;
        border: 2px solid #0a269d;
        font-size: 16px;
    }

    .generate-btn {
        background-color: white;
        color: #2043D5;
        padding: 10px;
        border-radius: 5px;
        border: 2px solid #2043D5;
        font-size: 16px;
        font-family: poppins;
        font-weight: 400;
        cursor: pointer;
    }



    .ready-state {
        display: grid;
        grid-template-columns: auto auto auto auto auto auto;
        justify-items: start;
        border: 1px solid #2043D5;
    }

    .pending-state {
        display: grid;
        grid-template-columns: auto auto auto auto auto auto;
        justify-items: start;
        border: 1px solid #2043D5;
    }

    .mb-titlelabel {
        font-family: poppins;
        font-size: 18px;
        font-weight: 600;
    }

    .mb-normallabel {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .mb-normallabelwc {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #2043D5;
        cursor: pointer;
    }

    .mb-normallabelready {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #2BC666;
    }

    .mb-normallabelpending {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #FF0202;
    }



    .container-firstcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        width: 180px;
    }

    .container-secondcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        width: 200px;
    }

    .container-thirdcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        width: 200px;
    }

    .container-fourthcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 350px;
    }

    .container-fifthcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        width: 25px;
    }


    .label-normal1 {
        font-family: poppins;
        font-size: 18px;
        font-weight: 400;
        margin: 5px 20px 0px 25px;
        color: white;
    }

    .form-group3 {
        display: flex;
        align-items: center;
    }

    .radio-pending, .radio-ready {
        height: 18px;
        width: 18px;
    }


    .delete-btn {
        height: 40px;
        width: auto;
        font-family: poppins;
        font-size: 18px;
        font-weight: 400;
        background-color: red;
        color: white;
        border: none;
        margin: 135px 0px 0px 0px;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>
<script src="script/dropdownSearch.js"></script>
<script src="script/Generate-BookCirculationPDF.js"></script>
<script src="script/DeleteDiv.js"></script>

</html>