<?php
session_start();
include 'db-connect.php';

if (isset($_GET['accession_number'])) {
    $accession_number = $_GET['accession_number'];

    // Fetch book details from the database
    $sql = "SELECT * FROM book_info WHERE Accession_Number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $accession_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables or use the $row array directly
        $_SESSION['Accession_Number'] = $row['Accession_Number'];
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
    } else {
        echo "No book found with the given Accession Number.";
    }
} else {
    echo "No Accession Number provided.";
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


    <title>Search Result Book Selected</title>
</head>
<body class='poppins-regular'>
    <div class="maincontainer">

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

                <label class="search1" onclick="location.href='HomePage.php'">Library search</label>
                <label class="searchiconlabel">></label>
                <label class="searchlabel" onclick="location.href='SearchResultBooks.php'">Search Results</label>
                <label class="searchiconlabel1">></label>

                <div class="booklblp">
                    <label class="searchlabel-book"><?php echo $_SESSION['book_title'];?></label>
                </div>


                <div class="book-info">
                    <div class="container-cards">
                        <div class="card1">
                            <div class="card1-pic">
                                <img src="C:\Users\kian\Downloads\image 5.png" width="200" height="330">
                            </div>

                            <div class="card1-details">

                                <!--<div class="user-rating">
                                    <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                                    <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                                    <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                                    <i class="fa fa-star rating-checked" style="font-size:12px"></i>
                                    <label class="rating-label">4.0 (100 ratings)</label>
                                </div>-->

                            </div>
                        </div>
                        <div class="card2">
                        <button type="button" class="button-details" onclick="window.location.href='SearchResultBookDetails.php?accession_number=<?= $row['Accession_Number']; ?>'"><i class="bi bi-journal" style="font-size:16px;"></i> Details</button>
                            <button type="button" class="button-details" onclick="window.location.href='SearchResultBookAllCopies.php?accession_number=<?= $row['Accession_Number']; ?>'"><i class="bi bi-folder" style="font-size:16px;"></i> All Copies</a>
                            <button type="button" class="button-details" onclick="window.location.href='SearchResultBookReviews.php?accession_number=<?= $row['Accession_Number']; ?>'"><i class="bi bi-chat-left-text"></i> Reviews</a>
                            <button type="button" class="button-details" onclick="window.location.href='SearchResultBookMoreInfo.php?accession_number=<?= $row['Accession_Number']; ?>'"><i class="bi bi-info-circle"></i> More Info</a>
                        </div>
                    </div>

                    <div class="bi-label">
                        <span>Shelf Location at RTU Pasig Library</span>
                    </div>
                   
                    <div class="container-cards1">
                        <div class="card3">
                            <div class="biblio-container1">
                                <div class="biblio-container1-bd">
                                    <div class="totalcopies-l">
                                        <div>
                                            <span class="label-tc">Total Copies</span>
                                        </div>
                                        <div>
                                            <span class="label-tc1">3</span>
                                        </div>
                                    </div>
                                    <div class="available-l">
                                        <div>
                                            <span class="label-av">Available</span>
                                        </div>
                                        <div>
                                            <span class="label-av1">1</span>
                                        </div>
                                        </div>
                                    <div class="borrowed-l">
                                        <div>
                                            <span class="label-bor">Borrowed</span>
                                        </div>
                                        <div>
                                            <span class="label-bor1">2</span>
                                        </div>
                                    </div>
                                    <div class="reserved-l">
                                        <div>
                                            <span class="label-res">Reserved</span>
                                        </div>
                                        <div>
                                            <span class="label-res1">0</span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card4">
                            <div class="biblio-container1">
                                <div class="biblio-container1-bd1">
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
                                            <span class="label-ac-label" style ="cursor:pointer;">Status <i class="bi bi-arrows-vertical" href="facebook.com"></i></span>
                                        </div>
                                    </div>

                                    <div class="ac-book-container">
                                        <div>
                                            <div class="ac-label-books">
                                                <div class="container-bookqty">
                                                    <span class="label-ac-label-book">1</span>
                                                </div>
                                                <div class="container-booksloc">
                                                    <span class="label-ac-label-book">
                                                        General Fiction -
                                                        Row B, Shelf 3
                                                    </span>
                                                </div>
                                                <div class="container-bookdcode">
                                                    <span class="label-ac-label-book">658.4 En65 2024</span>
                                                </div>
                                                <div class="container-bookanum">
                                                    <span class="label-ac-label-book">PCLIB-2024-001</span>
                                                </div>
                                                <div class="container-bookcon">
                                                    <span class="label-ac-label-book">Good</span>
                                                </div>
                                                <div class="container-bookstat">
                                                    <span class="label-ac-label-book">Available</span>
                                                </div>
                                            </div>
                                            <hr class="hrstyle">
                                        </div>
                                        <div>
                                            <div class="ac-label-books">
                                                <div class="container-bookqty">
                                                    <span class="label-ac-label-book">2</span>
                                                </div>
                                                <div class="container-booksloc">
                                                    <span class="label-ac-label-book">
                                                        General Fiction -
                                                        Row B, Shelf 3
                                                    </span>
                                                </div>
                                                <div class="container-bookdcode">
                                                    <span class="label-ac-label-book">658.4 En65 2024</span>
                                                </div>
                                                <div class="container-bookanum">
                                                    <span class="label-ac-label-book">PCLIB-2024-002</span>
                                                </div>
                                                <div class="container-bookcon">
                                                    <span class="label-ac-label-book">Good</span>
                                                </div>
                                                <div class="container-bookstat1">
                                                    <span class="label-ac-label-book">Borrowed</span>
                                                </div>
                                            </div>
                                            <hr class="hrstyle">
                                        </div>
                                        <div>
                                            <div class="ac-label-books">
                                                <div class="container-bookqty">
                                                    <span class="label-ac-label-book">3</span>
                                                </div>
                                                <div class="container-booksloc">
                                                    <span class="label-ac-label-book">
                                                        General Fiction -
                                                        Row B, Shelf 3
                                                    </span>
                                                </div>
                                                <div class="container-bookdcode">
                                                    <span class="label-ac-label-book">658.4 En65 2024</span>
                                                </div>
                                                <div class="container-bookanum">
                                                    <span class="label-ac-label-book">PCLIB-2024-003</span>
                                                </div>
                                                <div class="container-bookcon">
                                                    <span class="label-ac-label-book">Good</span>
                                                </div>
                                                <div class="container-bookstat1">
                                                    <span class="label-ac-label-book">Borrowed</span>
                                                </div>
                                            </div>
                                            <hr class="hrstyle">
                                        </div>                                   
                                    </div>
                            </div>
                        </div>
                    </div>
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
        top: 90px;
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
        top: 90px;
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
        top: 90px;
        left: 295px;
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
        cursor: pointer;
        color: #2043D5;
        font-size: 14px;
        font-family: poppins;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 90px;
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
        top: 580px;
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
            height: 630px;
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
        height: 600px;
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

    .biblio-container1-bd {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }
    .biblio-container1-bd1 {
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
    .bi-arrows-vertical {
        cursor:pointer;
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

    .label-ac-label-book {
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

    .hrstyle {
        width: 710px;
        margin: 2px 16px;
        height: 1.5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;  
    }
</style>
<script src="script/dropdownSearch.js">


</script>
</html>
