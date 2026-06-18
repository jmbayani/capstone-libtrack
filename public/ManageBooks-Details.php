 
<?php
session_start();
include 'db-connect.php';

if (isset($_GET['id'])) {
    $accession_number = $_GET['id'];

    // Fetch book details from the database
    $sql = "SELECT * FROM book_info WHERE Accession_Number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $accession_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables or use the $row array directly
        $_SESSION['accession_number'] = $row['Accession_Number'];
        $_SESSION['book_title'] = $row['Book_Title'];
        $_SESSION['book_image'] = base64_encode($row['Book_Image']);
        $_SESSION['author'] = $row['Author'];
        $_SESSION['isbn'] = $row['ISBN'];
        $_SESSION['physical_desc'] = $row['Physical_Description'];
        $_SESSION['genre'] = $row['Genre'];
        $_SESSION['book_status'] = $row['Book_Status'];
        $_SESSION['publisher'] = $row['Publisher'];
        $_SESSION['publication_date'] = $row['Publication_Date'];
        $_SESSION['copyright'] = $row['Copyright'];
        $_SESSION['book_language'] = $row['Book_Language'];
        $_SESSION['book_details'] = $row['Book_Details'];
    }

    $sqlCopies = "SELECT * FROM book_copies WHERE Accession_Number = ?";
    $stmtCopies = $conn->prepare($sqlCopies);
    $stmtCopies->bind_param("s", $accession_number);
    $stmtCopies->execute();
    $resultCopies = $stmtCopies->get_result();

    if ($resultCopies->num_rows > 0) {
        $row = $resultCopies->fetch_assoc();
        // Set session variables or use the $row array directly
        $_SESSION['dewey_code'] = $row['Dewey_Code'];
        $_SESSION['shelf_location'] = $row['Shelf_Location'];
        $_SESSION['quantity'] = $row['Quantity'];
        $_SESSION['book_condition'] = $row['Book_Condition'];
        $_SESSION['available'] = $row['Available'];
        $_SESSION['borrowed'] = $row['Borrowed'];
        $_SESSION['reserved'] = $row['Reserved'];
        $_SESSION['total_copies'] = $row['Total_Copies'];
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
    <link href="https://fonts.googleapis.com/css2?family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre Franklin:ital,wght@0,100..900;1,100..900&family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">
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
                            <div class="card1-pic">
                            <img src="data:image/jpeg;base64,<?php echo $_SESSION['book_image']; ?>" width="200" height="330">
                            </div>
                        </div>
            </div>
            <div class="container-buttons">
                <button class="button-editbook" onclick="window.top.location.href='ManageBooks-EditBook.php';"><i class="bi bi-pencil-square"></i> Edit Book</button>
                <button class="button-weedout"><i class="bi bi-file-earmark-x"></i> Weed Out</button>
            </div>
            <div class="container-cards1">
                <div class="bi-label">
                    <span>Book Details</span>
                </div>
                <div class="card3">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd">
                            <div class="details-t">
                                <div class="details-t-bg">
                                    <span class="details-title">Title:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-title-n"><?php echo $_SESSION['book_title']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-a">
                                <div class="details-a-bg">
                                    <span class="details-author">Author:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-author-n"><?php echo $_SESSION['author']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-i">
                                <div class="details-i-bg">
                                    <span class="details-isbn">ISBN:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-isbn-n"><?php echo $_SESSION['isbn']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-p">
                                <div class="details-p-bg">
                                    <span class="details-phydesc">Physical Description:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-phydesc-n"><?php echo $_SESSION['physical_desc']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-m">
                                <div class="details-m-bg">
                                    <span class="details-mat">Material:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-mat-n">Book</span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-k">
                                <div class="details-k-bg">
                                    <span class="details-keyword">Keyword:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-keyword-n"><?php echo $_SESSION['genre']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-s">
                                <div class="details-s-bg">
                                    <span class="details-stat">Status:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <?php if($_SESSION['book_status']==='Available'): ?>
                                        <span class="avail b-stat-n">Available</span>
                                    <?php elseif($_SESSION['book_status']==='Borrowed'): ?>
                                        <span class="bor b-stat-n">Borrowed</span>
                                    <?php elseif($_SESSION['book_status']==='Reserved'): ?>
                                        <span class="resrv b-stat-n">Reserved</span>
                                    <?php elseif($_SESSION['book_status']==='Weed Out'): ?>
                                        <span class="wo b-stat-n">Weed Out</span>
                                    <?php elseif($_SESSION['book_status']==='For Repair'): ?>
                                        <span class="frep b-stat-n">For Repair</span>
                                    <?php endif; ?>
                                    <hr class="hrstyle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card4">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd">
                            <div class="details-pub">
                                <div class="details-pub-bg">
                                    <span class="details-publisher">Publisher:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-publisher-n"><?php echo $_SESSION['publisher']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-pubd">
                                <div class="details-pubd-bg">
                                    <span class="details-publisherdate">Publication Date:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-publisherdate-n"><?php echo $_SESSION['publication_date']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-copy">
                                <div class="details-copy-bg">
                                    <span class="details-copyright">Copyright:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-copyright-n">by <?php echo $_SESSION['copyright']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-lang">
                                <div class="details-lang-bg">
                                    <span class="details-language">Language:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-language-n"><?php echo $_SESSION['book_language']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                            <div class="details-bs">
                                <div class="details-bs-bg">
                                    <span class="details-booksummary">Book Summary:</span>
                                </div>
                                <div class="details-tl-bg">
                                    <span class="b-booksummary-n"><?php echo $_SESSION['book_details']; ?></span><hr class="hrstyle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hrstyle3">
                <div class="bi-label1">
                    <span>Shelf Location at RTU Pasig Library</span>
                </div>
                <div class="card5">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd1">
                            <div class="totalcopies-l">
                                <div>
                                    <span class="label-tc">Total Copies</span>
                                </div>
                            <div>
                                <span class="label-tc1"><?php echo $_SESSION['total_copies'];?></span>
                            </div>
                        </div>
                        <div class="available-l">
                            <div>
                                <span class="label-av">Available</span>
                            </div>
                                <div>
                                    <span class="label-av1"><?php echo $_SESSION['available'];?></span>
                                </div>
                                </div>
                            <div class="borrowed-l">
                                <div>
                                    <span class="label-bor">Borrowed</span>
                                </div>
                                <div>
                                    <span class="label-bor1"><?php echo $_SESSION['borrowed'];?></span>
                                </div>
                            </div>
                            <div class="reserved-l">
                                <div>
                                    <span class="label-res">Reserved</span>
                                </div>
                                <div>
                                    <span class="label-res1"><?php echo $_SESSION['reserved'];?></span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card6">
                    <div class="biblio-container2">
                        <div class="biblio-container1-bd2">
                            <div class="ac-label">
                                <div>
                                    <span class="label-ac-label">Qty.</span>
                                </div>
                                <div>
                                    <span class="label-ac-label">Shelf Location</span>
                                </div>
                                <div>
                                    <span class="label-ac-label">Dewey Code</span>
                                </div>
                                <div>
                                    <span class="label-ac-label">Accession Number/Barcode</span>
                                </div>
                                <div>
                                    <span class="label-ac-label">Condition</span>
                                </div>
                                <div>
                                    <span class="label-ac-label">Status</span>
                                </div>
                            </div>

                            <div class="ac-book-container">
                                <div class="biblio-container1-bd1">
                                    <div class="ac-label-books">
                                        <div class="container-bookqty">
                                            <span class="label-ac-label-book"><?php echo $_SESSION['quantity'];?></span>
                                        </div>
                                        <div class="container-booksloc">
                                            <span class="label-ac-label-book">
                                                <?php echo $_SESSION['shelf_location'];?>
                                            </span>
                                        </div>
                                        <div class="container-bookdcode">
                                            <span class="label-ac-label-book"><?php echo $_SESSION['dewey_code'];?></span>
                                        </div>
                                        <div class="container-bookanum">
                                            <span class="label-ac-label-book"><?php echo $_SESSION['accession_number'];?></span>
                                        </div>
                                        <div class="container-bookcon">
                                            <span class="label-ac-label-book"><?php echo $_SESSION['book_condition'];?></span>
                                        </div>
                                        <div class="container-bookstat">
                                            <?php if($_SESSION['book_status']==='Available'): ?>
                                                <span class="label-ac-label-book-avail">Available</span>
                                            <?php elseif($_SESSION['book_status']==='Borrowed'): ?>
                                                <span class="label-ac-label-book-bor">Borrowed</span>
                                            <?php elseif($_SESSION['book_status']==='Reserved'): ?>
                                                <span class="label-ac-label-book-resrv">Reserved</span>
                                                <?php elseif($_SESSION['book_status']==='Weed Out'): ?>
                                                <span class="label-ac-label-book-wo">Weed Out</span>
                                            <?php elseif($_SESSION['book_status']==='For Repair'): ?>
                                                <span class="label-ac-label-book-frep">For Repair</span>
                                            <><?php endif; ?>
                                        </div>
                                    </div>
                                    <hr class="hrstyle2">
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

    .maincontainer {
        height: 646px;
        width: 1194px;
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
        height: 20px;
        width: 70%;
        border: 3px solid #2043D5;
        border-radius: 30px 0px 0px 30px;
        padding: 11px 11px 11px 30px;
        top: 50px;
        left: 520px;
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
        height: 25px;
        width: 155px;
        border-radius: 0px 30px 30px 0px;
        top: 50px;
        left: 500px;
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
        top: 170px;
        left: 465px;
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
        top: 30px;
        left: 100px;
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
        top: 30px;
        left: 165px;
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
        top: 30px;
        left: 295px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .booklblp {
        position: absolute;
        top: 17px;
        left: 307px;
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
        top: 30px;
        left: 230px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
        .searchlabel:hover {
            background: none;
            border: none;
            cursor: pointer;
            color: #5966EC;
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
        width: 1125px;
        border-radius: 50px;
        background-color: #EFF5FF;
        border: 15px solid #2043D5;
        position: absolute;
        top: 50px;
        left: 25px;
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

        .container-cards > div.card1{
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
        gap: 25px;
        padding: 0px;
        align-content: baseline;
        margin-top: 20px;
        margin-left: 20px;
    }

        .container-cards1 > div.card3 {
            display: flex;
            height: 330px;
            width: 750px;
            border-radius: 25px;
            border: 3px solid #2043D5;
            background-color: #EFF5FF;
            overflow: hidden;
        }
        .container-cards1 > div.card4 {
            display: flex;
            height: 330px;
            width: 750px;
            border-radius: 25px;
            border: 3px solid #2043D5;
            background-color: #EFF5FF;
            overflow: hidden;
        }
        .container-cards1 > div.card5 {
            display: flex;
            height: 130px;
            width: 750px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

        .container-cards1 > div.card6 {
            display: flex;
            height: 630px;
            width: 755px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

    .details-t-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
    }
    .details-tl-bg {
        width: auto;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }
    .details-a-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }
    .details-i-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }
    .details-p-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }
    .details-m-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }
    .details-k-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }
    .details-s-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
        flex-direction: column;
    }
    .details-pub-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
    }
    .details-pubd-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
    }
    .details-copy-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
    }
    .details-lang-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
    }
    .details-bs-bg {
        background-color: #2043D5;
        width: 230px;
        height: auto;
        display: flex;
        text-align: left;
        align-items: baseline;
    }
    .details-title {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-author {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-isbn {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-phydesc {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-mat {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-stat {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-keyword {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 1600px;
        margin: 20px 25px;
    }
    .details-publisher {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-publisherdate {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-copyright {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-language {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }
    .details-booksummary {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        margin: 20px 20px;
        color: #FFFFFF;
        width: 200px;
        margin: 20px 25px;
    }

    .hrstyle {
        width: 470px;
        margin: 5px 25px;
        height: 1.5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;
    }
    .hrstyle2 {
        width: 710px;
        margin: 2px 16px;
        height: 1.5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;  
    }
    .hrstyle3 {
        width: 710px;
        margin: 2px 16px;
        height: 5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;  
    }
    .b-title-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }

    .b-author-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-isbn-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-phydesc-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-mat-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-stat-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
     .avail {
        color: #2BC666;
     }
    .bor {
        color: #FF4444;
     }
    .resrv {
        color: #5966EC;
     }
    .wo {
        color: #757575;
     }
    .frep {
        color: #000000;
     }
    .b-keyword-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        word-break: break-word;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-publisher-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-publisherdate-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-copyright-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-language-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }
    .b-booksummary-n {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
        margin: 20px 25px 0px;
        margin-left: 25px;
        margin-top: 20px;
    }

    .details-t, .details-a, .details-i, .details-p, .details-m, .details-k, .details-s, .details-pub, .details-pubd, .details-copy, .details-lang, .details-bs {
        display: flex;
    }

    .biblio-container1 {
        height: 330px;
        width: 750px;
        overflow:auto;
    }

    .biblio-container2 {
        height: 552px;
        width: 750px;
        overflow:auto;
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
        overflow: visible;
    }

    .bi-label {
        top: 0px;
        left: 0px;
        font-family: poppins;
        font-size: 20px;
        font-weight: 700;
    }
    .bi-label1 {
        top: 0px;
        left: 0px;
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

    .biblio-container1-bd1 {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }
    .biblio-container1-bd2 {
        height: 600px;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }
    
    .totalcopies-l {
        height: 130px;
        width: 170px;
        border-radius: 25px;
        background-color: #CAC52F;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .available-l {
        height: 130px;
        width: 170px;
        border-radius: 25px;
        background-color: #2BC666;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .borrowed-l {
        height: 130px;
        width: 170px;
        border-radius: 25px;
        background-color: #FF4444;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .reserved-l {
        height: 130px;
        width: 170px;
        border-radius: 25px;
        background-color: #757575;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .label-tc, .label-tc1, .label-av, .label-av1, .label-bor, .label-bor1, .label-res, .label-res1 {
        font-family: poppins;
        font-size: 20px;
        font-weight: 400;
    }

    .ac-label {
        width: 750px;
        height: 50px;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        background-color: #2043D5;
        border-radius: 25px 25px 0px 0px;
        align-items: center;
        color: white;
    }
    .label-ac-label {

        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }
    .ac-book-container {
        height: 530px;
        width: 743px;
        border: 4px solid #2043D5;
        overflow: auto;
        border-radius: 0px 0px 25px 25px;
    }
    .ac-label-books {
        width: 741px;
        height: auto;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    
    .label-ac-label-book-avail {
        color: #2BC666;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .label-ac-label-book-bor {
        color: #CAC52F;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .label-ac-label-book-resrv {
        color: #5966EC;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .label-ac-label-book-wo {
        color: #757575;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .label-ac-label-book-frep {
        color: #000000;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-bookqty {
        height: auto;
        width: 55px;
        text-align: center;
        margin: 15px 0px;
    }
    .container-booksloc {
        height: auto;
        width: 130px;
        text-align: center;
        margin: 15px 0px;
    }
    .container-bookdcode {
        height: auto;
        width: 118px;
        text-align: center;
        margin: 15px 0px;
    }
    .container-bookanum {
        height: auto;
        width: 243px;
        text-align: center;
        margin: 15px 0px;
    }
    .container-bookcon {
        height: auto;
        width: 105px;
        text-align: center;
        margin: 15px 0px;
    }
    .container-bookstat {
        height: auto;
        width: 88px;
        text-align: start;
        margin: 15px 0px;
        color: #2BC666;
    }
    .container-bookstat1 {
        height: auto;
        width: 88px;
        text-align: start;
        margin: 15px 0px;
        color: #FF4444;
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

    .container-buttons {
        position: absolute;
        margin-left: 40px;
        margin-top: 5px;
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
    .bookbin-back {
        height: auto;
        width: auto;
        background-color: transparent;
        border: 3.5px solid #2043D5;
        border-radius: 25px;
        color: #000000;
        padding: 0px 15px;
        margin: 15px 0px 15px 660px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

    .container-buttons {
        position: absolute;
        margin-left: 40px;
        margin-top: 5px;
    }

    .button-editbook {
        height: 40px;
        width: 150px;
        background-color: transparent;
        border: 3.5px solid #2043D5;
        border-radius: 25px;
        color: #000000;
        padding: 0px 15px;
        margin: 15px 0px 15px 722px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

        .button-editbook:hover {
            background-color: #2043D5;
            color: white;
        }

    .button-weedout {
        height: 40px;
        width: 150px;
        background-color: transparent;
        border: 3.5px solid #2043D5;
        border-radius: 25px;
        color: #000000;
        padding: 0px 15px;
        margin: 15px 0px 15px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

        .button-weedout:hover {
            background-color: #2043D5;
            color: white;
        }
</style>

<script src="script/dropdownSearch.js">


</script>

</html>
