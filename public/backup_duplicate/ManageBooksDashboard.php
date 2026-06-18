<?php
include "db-connect.php";

$status = "";
$results = null;

if (isset($_POST['available'])) {
    $status = 'Available';
} elseif (isset($_POST['borrowed'])) {
    $status = 'Borrowed';
} elseif (isset($_POST['reserved'])) {
    $status = 'Reserved';
} elseif (isset($_POST['weed_out'])) {
    $status = 'Weed Out';
}  elseif (isset($_POST['for_repair'])) {
    $status = 'For Repair';
} else {
    $stmt = $conn->prepare("
    SELECT 
        bi.Book_Title,
        bi.Author,
        bi.Shelf_Location,
        bi.Accession_Number,
        bi.Book_Status,
        bc.Total_Copies
    FROM 
        book_info bi
    JOIN 
        book_copies bc ON bc.Accession_Number = bi.Accession_Number
    ");
    $stmt->execute();
    $results = $stmt->get_result();
}

if ($status) {
    $stmt = $conn->prepare( "
    SELECT 
        bi.Book_Title,
        bi.Author,
        bi.Shelf_Location,
        bi.Accession_Number,
        bi.Book_Status,
        bc.Total_Copies
    FROM 
        book_info bi
    JOIN 
        book_copies bc ON bc.Accession_Number = bi.Accession_Number
    WHERE
        bi.Book_Status = ?
    ");
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $results = $stmt->get_result();
}

$check_query2 = "SELECT 
    (SELECT COUNT(*) FROM book_info) AS total_books, 
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Available') AS avail_books, 
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Borrowed') AS borrow_books,
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Reserved') AS reserve_books,
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Weed Out') AS wout_books,
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'For Repair') AS frepair_books";
                
$stmt_check2 = $conn->prepare($check_query2);
$stmt_check2->execute();
$result2 = $stmt_check2->get_result();

if ($result2 && $row = $result2->fetch_assoc()) {
    $total = $row["total_books"];
    $avail = $row["avail_books"];
    $borrow = $row["borrow_books"];
    $reserve = $row["reserve_books"];
    $wout = $row["wout_books"];
    $repair = $row["frepair_books"];
}
?>
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
    <div class="no-select maincontainer">

        <div class="book-info">
            <div class="container-cards">
                <div class="card1">

                    <div class="bd-button-container">

                        <div class="label-bdbc-container">
                            <span class="label-bdbc">Books Dashboard</span>
                        </div>

                        <div class="buttons-bdbc-container">
                            <button class="button-genrep" onclick="location.href = 'ManageBooks-GenerateReport.php';"><i class="bi bi-file-earmark-text" style="font-size: 16px;"></i> Generate Report</button>
                            <button class="button-accrep" onclick="location.href = 'ManageBooks-AccreditationReport.php';"><i class="bi bi-file-earmark-text" style="font-size: 16px;"></i> Accreditation Report</button>
                        </div>


                    </div>

                    <form class="cards-bdetails" method="POST">
                        <div class="container-bdcardcon">
                            <button class="totalbooks-container" type="submit" name="totalbooks">
                                <div class="label-totalbooks-container">
                                    <span class="label-bdcardconb">Total Books</span>
                                </div>
                                <div class="label-totalbookscount-container">
                                    <span class="label-bdcardconb1"><?php echo $total; ?></span>
                                </div>
                            </button>
                        </div>

                        <div class="container-bdcardcon1">
                            <button class="avbooks-container" type="submit" name="available">
                                <div class="label-avbooks-container">
                                    <span class="label-bdcardcon" name="available">Available Books</span>
                                </div>
                                <div class="label-avbookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $avail; ?></span>
                                </div>
                            </button>

                            <button class="borbooks-container" type="submit" name="borrowed">
                                <div class="label-borbooks-container">
                                    <span class="label-bdcardcon">Borrowed Books</span>
                                </div>
                                <div class="label-borbookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $borrow; ?></span>
                                </div>
                            </button>

                            <button class="resbooks-container" type="submit" name="reserved">
                                <div class="label-resbooks-container">
                                    <span class="label-bdcardcon">Reserved Books</span>
                                </div>
                                <div class="label-resbookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $reserve; ?></span>
                                </div>
                            </button>

                            <button class="wobooks-container" type="submit" name="weed_out">
                                <div class="label-wobooks-container">
                                    <span class="label-bdcardcon">Weed-Out Books</span>
                                </div>
                                <div class="label-wobookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $wout; ?></span>
                                </div>
                            </button>
                        </div>

                        <div class="container-bdcardcon2">
                            <button class="repbooks-container" type="submit" name="repair">
                                <div class="label-repbooks-container">
                                    <span class="label-bdcardconb">For Repair Books</span>
                                </div>
                                <div class="label-repbookscount-container">
                                    <span class="label-bdcardconb1"><?php echo $repair; ?></span>
                                </div>
                            </button>
                        </div>
                    </form>

                </div>

                <div class="card2">

                    <div class="buttons-bdbc-container1">
                        <button class="button-addbook" onclick="window.top.location.href='ManageBooks-AddBook.php'"><i class="bi bi-file-earmark-plus" style="font-size: 20px;"></i> Add Book</button>
                        <button id="openOverlayBtn" class="button-excsv"><i class="bi bi-filetype-csv" style="font-size: 20px;"></i> Upload CSV</button>
                    </div>

                </div>


            </div>

            <div class="container-cards1">
                <div class="card3">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd1">
                            <div class="mb-label">
                                <div>
                                    <span class="label-mb-label">Book Title<i class="bi bi-arrows-vertical" href=""></i></span>
                                </div>
                                <div>
                                    <span class="label-mb-label1">Author<i class="bi bi-arrows-vertical" href=""></i></span>
                                </div>
                                <div>
                                    <span class="label-mb-label2">Subject<i class="bi bi-arrows-vertical" href=""></i></span>
                                </div>
                                <div>
                                    <span class="label-mb-label3">Accession No.<i class="bi bi-arrows-vertical" href=""></i></span>
                                </div>
                                <div>
                                    <span class="label-mb-label4">Status<i class="bi bi-arrows-vertical" href=""></i></span>
                                </div>
                                <div>
                                    <span class="label-mb-label5"><i class="bi bi-file-earmark-text-fill"></i></span>
                                </div>
                            </div>

                            <div class="mb-book-container">
                                <?php if ($results && $results->num_rows > 0): ?>
                                    <?php while ($row = $results->fetch_assoc()): ?>
                                    <div class="mb-label-books">
                                        <div class="container-btitle">
                                            <span class="label-mb-label-book" onclick="location.href = 'ManageBooks-Details.php';"><?= htmlspecialchars($row['Book_Title'])?></span>
                                        </div>
                                        <div class="container-bauthor">
                                            <span class="label-mb-label-book1"><?= htmlspecialchars($row['Author'])?></span>
                                        </div>
                                        <div class="container-bsubject">
                                            <span class="label-mb-label-book2"><?= htmlspecialchars($row['Shelf_Location'])?></span>
                                        </div>
                                        <div class="container-baccessionnum">
                                            <span class="label-mb-label-book3"><?= htmlspecialchars($row['Accession_Number'])?></span>
                                        </div>
                                        <?php if($row['Book_Status']==='Available'): ?>
                                            <div class="container-bstatus-available">
                                                <span class="label-mb-label-book4"><?= htmlspecialchars($row['Book_Status'])?></span>
                                            </div>
                                        <?php elseif($row['Book_Status']==='Borrowed'): ?>
                                            <div class="container-bstatus-borrowed">
                                                <span class="label-mb-label-book4"><?= htmlspecialchars($row['Book_Status'])?></span>
                                            </div>
                                        <?php elseif($row['Book_Status']==='Reserved'): ?>
                                            <div class="container-bstatus-reserved">
                                                <span class="label-mb-label-book4"><?= htmlspecialchars($row['Book_Status'])?></span>
                                            </div>
                                        <?php elseif($row['Book_Status']==='Weed Out'): ?>
                                            <div class="container-bstatus-weedout">
                                                <span class="label-mb-label-book4"><?= htmlspecialchars($row['Book_Status'])?></span>
                                            </div>
                                        <?php elseif($row['Book_Status']==='For Repair'): ?>
                                            <div class="container-bstatus-repair">
                                                <span class="label-mb-label-book4"><?= htmlspecialchars($row['Book_Status'])?></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="container-bcopy">
                                            <span class="label-mb-label-book5"><?= htmlspecialchars($row['Total_Copies'])?></span>
                                        </div>
                                    </div>
                                    <hr class="hrstyle">
                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <form class="search-book" action="/action_page.php">
            <div class="search-container">
                <input class="poppins-regular search-text" type="text" placeholder="Search.." name="search">

                <div class="dropdown-select">
                    <div class="select">
                        <span class="selected">Type:</span>
                        <div class="arrow"></div>
                    </div>
                    <ul class="dropdown-menu">
                        <li class="active">Title</li>
                        <li>Genre</li>
                        <li>Author</li>
                        <li>Subject</li>
                        <li>Accession No.</li>
                    </ul>
                </div>
            </div>
        </form>
             
        <div id="overlay" class="overlay">
            <div class="overlay-content">
                <h2>Upload CSV File</h2>
            
                <input type="file" id="csvFile" accept=".csv">
                <br><br>
              
                <button id="browseBtn" class="browse-btn">Browse</button>
                <button id="uploadBtn" class="upload-btn">Upload</button>
                <button id="cancelBtn" class="cancel-btn">Cancel</button>
            
                <div id="filePreview"></div>
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
        width: 1500px;
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

    .search-book {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form.search-book input[type=text] {
        height: 23px;
        width: 480px;
        border: 3px solid #2043D5;
        border-radius: 30px 0px 0px 30px;
        padding: 11px 11px 11px 30px;
        top: 435px;
        left: 540px;
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
        top: 435px;
        left: 255px;
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
        top: 555px;
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

    .search1 {
        background: none;
        border: none;
        cursor: pointer;
        color: #2043D5;
        font-size: 14px;
        font-family: poppins;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 90px;
        left: 80px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

        .search1:hover {
            background: none;
            border: none;
            cursor: pointer;
            color: #5966EC;
        }

    .searchiconlabel {
        background: none;
        border: none;
        color: black;
        font-size: 20px;
        font-family: poppins;
        font-weight: 600;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 90px;
        left: 145px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .searchiconlabel1 {
        background: none;
        border: none;
        color: black;
        font-size: 20px;
        font-family: poppins;
        font-weight: 600;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 90px;
        left: 285px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .booklblp {
        position: absolute;
        top: 77px;
        left: 304px;
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

    .att1 {
        font-family: poppins;
        font-size: 25px;
        font-weight: 700;
        font-style: italic;
    }

    .att3 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 700;
    }

    .book-info {
        height: auto;
        width: 100%;
        background-color: transparent;
        position: absolute;
        top: 555px;
        left: 703px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        overflow: hidden;
        display: grid;
        grid-template-columns: auto;
        justify-content: start;
        gap: 30px;
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
            height: 370px;
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

    .biblio-container1-bd2 {
        height: 260px;
        display: flex;
        flex-direction: column;
    }

    .hrstyle {
        width: 1095px;
        margin: 2px 16px;
        height: 1.5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;
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

    .label-mb-label {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 25px;
        cursor: pointer;
    }

    .label-mb-label1 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 240px;
        cursor: pointer;
    }
    .label-mb-label2 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 100px;
        cursor: pointer;
    }
    .label-mb-label3 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 100px;
        cursor: pointer;
    }
    .label-mb-label4 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 100px;
        cursor: pointer;
    }
    .label-mb-label5 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 80px;
        cursor: pointer;
    }

    .mb-book-container {
        height: 530px;
        border: 1px solid #2043D5;
        overflow: auto;
        border-radius: 0px 0px 25px 25px;
    }

    .mb-label-books {
        width: 1125px;
        height: auto;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .label-mb-label-book {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #2043D5;
        cursor:pointer;
    }

    .label-mb-label-book1 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .label-mb-label-book2 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }
    .label-mb-label-book3 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }
    .label-mb-label-book4 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }
    .label-mb-label-book5 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-btitle {
        height: auto;
        width: 290px;
        text-align: start;
        margin: 15px 0px 15px 15px;
    }

    .container-bauthor {
        height: auto;
        width: 170px;
        text-align: center;
        margin: 15px 0px 15px 0px;
    }

    .container-bsubject {
        height: auto;
        width: 170px;
        text-align: center;
        margin: 15px 0px 15px 0px;
    }

    .container-baccessionnum {
        height: auto;
        width: 235px;
        text-align: center;
        margin: 15px 0px 15px 0px;
    }

    .container-bstatus-available {
        height: auto;
        width: 155px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        color: #2BC666;
    }

    .container-bstatus-borrowed {
        height: auto;
        width: 155px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        color: #FF0202;
    }

    .container-bstatus-reserved {
        height: auto;
        width: 155px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        color: #7B61FF;
    }

    .container-bstatus-weedout {
        height: auto;
        width: 155px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        color: #757575;
    }

    .container-bstatus-repair {
        height: auto;
        width: 155px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        color: #CAC52F;
    }

    .container-bdcardcon1 {
        padding: 0;
        margin: 0;
        width: 540px;
        display: grid;
        grid-template-columns: auto auto;
        justify-content: space-around;
    }
    .container-bcopy {
        height: auto;
        width: 90px;
        text-align: center;
        margin: 15px 0px 15px 0px;
    }

    .totalbooks-container {
        height: 250px;
        width: 280px;
        border: 3px solid #2043D5;
        border-radius: 30px 30px;
        cursor: pointer;
    }
        .totalbooks-container:hover {
            color: white;
            border-radius: 30px 30px;
            background-color: #2043D5;
            cursor:pointer;
        }

    .avbooks-container {
        height: 110px;
        width: 240px;
        border: 3px solid #2043D5;
        border-radius: 30px 30px;
        margin-bottom: 25px;
        cursor: pointer;
    }
        .avbooks-container:hover {
            color: white;
            border-radius: 30px 30px;
            background-color: #2043D5;
            cursor: pointer;
        }

   .borbooks-container {
       height: 110px;
       width: 240px;
       border: 3px solid #2043D5;
       border-radius: 30px 30px;
       margin-bottom: 25px;
       cursor: pointer;
   }
    .borbooks-container:hover {
        color: white;
        border-radius: 30px 30px;
        background-color: #2043D5;
        cursor: pointer;
    }

   .resbooks-container {
       height: 110px;
       width: 240px;
       border: 3px solid #2043D5;
       border-radius: 30px 30px;
       cursor: pointer;
   }
        .resbooks-container:hover {
            color: white;
            border-radius: 30px 30px;
            background-color: #2043D5;
            cursor: pointer;
        }

    .wobooks-container {
        height: 110px;
        width: 240px;
        border: 3px solid #2043D5;
        border-radius: 30px 30px;
        cursor: pointer;
    }
        .wobooks-container:hover {
            color: white;
            border-radius: 30px 30px;
            background-color: #2043D5;
            cursor: pointer;
        }

    .repbooks-container {
        height: 250px;
        width: 280px;
        border: 3px solid #2043D5;
        border-radius: 30px 30px;
        cursor: pointer;
    }
        .repbooks-container:hover {
            color: white;
            border-radius: 30px 30px;
            background-color: #2043D5;
            cursor: pointer;
        }

    .label-totalbooks-container {
        text-align: start;
        margin: 32px 0px 0px 32px;
    }
    .label-totalbookscount-container {
        text-align: end;
        margin: 55px 32px 0px 0px;
    }

    .label-avbooks-container {
        text-align: start;
        margin: 16px 0px 0px 24px;
    }
    .label-avbookscount-container {
        text-align: end;
        margin: 0px 32px 0px 0px;
    }

    .label-resbooks-container {
        text-align: start;
        margin: 16px 0px 0px 24px;
    }
    .label-resbookscount-container {
        text-align: end;
        margin: 0px 32px 0px 0px;
    }

    .label-borbooks-container {
        text-align: start;
        margin: 16px 0px 0px 24px;
    }
    .label-borbookscount-container {
        text-align: end;
        margin: 0px 32px 0px 0px;
    }

    .label-wobooks-container {
        text-align: start;
        margin: 16px 0px 0px 24px;
    }
    .label-wobookscount-container {
        text-align: end;
        margin: 0px 32px 0px 0px;
    }

    .label-repbooks-container {
        text-align: start;
        margin: 32px 0px 0px 32px;
    }
    .label-repbookscount-container {
        text-align: end;
        margin: 55px 32px 0px 0px;
    }

    .label-bdcardcon {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }
    .label-bdcardcon1 {
        font-family: poppins;
        font-size: 40px;
        font-weight: 600;
    }

    .label-bdcardconb {
        font-family: poppins;
        font-size: 18px;
        font-weight: 400;
    }

    .label-bdcardconb1 {
        font-family: poppins;
        font-size: 80px;
        font-weight: 600;
    }

    .bd-button-container {
        height: auto;
        width: 100%;
        display: flex;
        flex-direction: row;
    }
    .bd-button-container1 {
        height: auto;
        width: 1500px;
        display: flex;
        flex-direction: row;
    }
    .label-bdbc {
        font-family: Lilita One;
        font-size: 45px;
        font-weight: 400;
    }

    .button-genrep {
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
        font-weight: 600;
        cursor: pointer;
    }

    .button-accrep {
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
        font-weight: 600;
        cursor: pointer;
    }

    .button-addbook {
        height: 50px;
        width: 180px;
        background-color: transparent;
        border: 3px solid #2043D5;
        border-radius: 25px;
        color: #2043D5;
        padding: 0px 15px;
        margin: 0px 0px 0px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 20px;
        font-weight: 400;
        cursor: pointer;
    }
        .button-addbook:hover {
            color: white;
            background-color: #2043D5;
            cursor: pointer;
        }

    .button-excsv {
        height: 50px;
        width: 180px;
        background-color: transparent;
        border: 3px solid #2043D5;
        border-radius: 25px;
        color: #2043D5;
        padding: 0px 15px;
        margin: 0px 0px 0px 740px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 20px;
        font-weight: 400;
        cursor: pointer;
    }

        .button-excsv:hover {
            color: white;
            background-color: #2043D5;
            cursor: pointer;
        }
        .label-bdbc-container {
            margin: 0px 0px 0px 40px;
        }

    .buttons-bdbc-container {
        margin: 0px 0px 0px 320px;
    }


    ::-webkit-file-upload-button {
        display: none;
    }
  
    .overlay {
        display: none; 
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        justify-content: center;
        align-items: center;
    }

    .overlay-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        border: 4px solid #2043D5;
        text-align: center;
        width: 300px;
        position: relative;
    }

    button {
        border: none;
        cursor: pointer;
    }

    .open-btn {
        margin-top: 20px;
    }

    .browse-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .upload-btn {
        background-color: #2196F3;
        color: white;
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .cancel-btn {
        background-color: red;
        color: white;
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #filePreview {
        margin-top: 15px;
        padding: 10px;
        background-color: #f1f1f1;
        max-height: 200px;
        overflow-y: auto;
        font-size: 14px;
    }

</style>
<script src="script/dropdownSearch.js"></script>
<script src="script/OverlayUploadCSV.js"></script>
</html>