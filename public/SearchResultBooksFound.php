<?php
    include 'search_books.php';
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

    <title>Search Result Books Found</title>
</head>
<body class='poppins-regular'>
    <div class="reserve-overlay" id="reserve-overlay"></div>
    <div class="reserve-popup" id="reserve-popup">
        <div class="popup-buttons">
            <h2 class="lilita-one-regular popup-desc">Reserved Book</h2>
            <a class="close-btn" onclick="closePopup()"><i class="cross-icon bi bi-x-circle-fill"></i></a>
        </div>
        <div class="popup-info mb-3">
            <table class="popup-table">
                    <tr class="popup-entry">
                        <td><b>Book Title:</b></td>
                        <td><b>Author:</b></td>
                        <td><b>ISBN:</b></td>
                        <td><b>Subject:</b></td>
                        <td><b>Reserved By:</b></td>
                        <td><b>Email:</b></td>
                    </tr>
                    <tr class="popup-entry">
                        <td>Anxious People</td>
                        <td>John Mayers</td>
                        <td>978-0-316-76948-2</td>
                        <td> Periodical</td>
                        <td>Liam Bennett</td>
                        <td>2021-10392@rtuedu.ph</td>
                    </tr>
            </table>
        </div>
    </div>		
    
    <div class="maincontainer">

        <form class="search-book" action="search_book.php" method="GET">
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
        </form>
                <p class="parg5">Sort by: </p>

                <div class="sort-select">
                    <div class="select-sort">
                        <span class="sort-selected">Type:</span>
                        <div class="arrow-sort"></div>
                    </div>
                    <ul class="sort-menu">
                        <li class="sort-active">Relevance</li>
                        <li>Newest</li>
                        <li>Oldest</li>
                    </ul>
                </div>

                <label class="search1" onclick="location.href='HomePage.php'">Library search</label>
                <label class="searchiconlabel">></label>
                <label class="searchlabel">Search Results</label>

                <p class="parg1">Search results for <a class="att1">“<?php echo $_SESSION['search_text']; ?>”</a></p>
                <?php if ($totalResults > 0): ?>
                <p class="parg2">Showing <?= $_SESSION['start'] ?> to <?= $_SESSION['end'] ?> out of <?= $_SESSION['totalResults'] ?> results</p>
                <?php endif;
                if ($totalResults > 0 && $results > 0): ?>
                    <div class="container-cards">
                        <?php foreach ($results as $row): ?>
                        <div class="card1">
                            <div class="card1-pic">
                                <img src="<?=$row['Book_Image']?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>

                            <div class="card1-details">
                                <h1 class="header1">
                                    <?=$row['Book_Title']?> <button class="bookmarkbtn"><i class="fa-solid fa-bookmark" style="font-size: 32px;"></i></button>
                                </h1>
                                <h1 class="header2">
                                    by '. $_SESSION['author'] .'
                                </h1>
                                <label class="detail-label1">Published <a class="dlabel-published">'. $_SESSION['publication_date'] .'</a></label><br>
                                <label class="detail-label1">ISBN: <a class="dlabel-isbn">'. $_SESSION['isbn'] .'</a></label><br>
                                <label class="detail-label1">Physical Description: <a class="dlabel-physicaldesc">'. $_SESSION['physical_desc'] .'</a></label><br>
                                <label class="detail-label1">Copyright: <a class="dlabel-copyright">'. $_SESSION['copyright'] .'</a></label><br>
                                <label class="detail-label1">Material: <a class="dlabel-material">Book</a></label><br>
                                <label class="detail-label1">Keyword: <a class="dlabel-keyword">'. $_SESSION['genre'] .'</a></label><br>
                                <label class="detail-label1">Status: <a class="dlabel-status">'. $_SESSION['book_status'] .'</a></label><br>
                        <button type="button" id="reservedBooks" class="reserve-btn">Reserved this book</button>
                        <button type="button" onclick="location.href='SearchResultBookDetails2.php'" class="seebook-btn" >See book</button>
                            </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
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

    .reserve-popup {
            display: none;
            position: fixed;
			width: 500px;
			height: 250px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
			border: 3px solid #2043D5;
			border-radius: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
		.popup-desc {
			color: black;
			font-size: 40px;
            margin-left: 80px;
            margin-right: 80px;
			text-align: center;
		}
        .popup-info {
			color: black;
            margin-left: 80px;
            margin-right: 80px;
			text-align: center;
		}
		.popup-buttons {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: row;
		}
        popup-table {
            width: 100%;
            border-collapse: collapse;
        }
        .popup-table th, .popup-table td {
            padding: 10px;
            text-align: left;
        }
        .reserve-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
        .cross-icon {
            font-size: 30px;
            cursor: pointer;
        }
        .cross-icon:hover {
            color: #2043D5;;
        }

    .dropdown-select {
        position: relative;
        width: 15%;
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
        left: 230px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .parg1 {
        font-family: poppins;
        font-size: 25px;
        position: absolute;
        top: 120px;
        left: 200px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .parg2 {
        font-family: poppins;
        font-size: 16px;
        position: absolute;
        top: 170px;
        left: 164px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .parg5 {
        font-family: poppins;
        font-size: 16px;
        position: absolute;
        top: 133px;
        left: 940px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
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

    .sort-select {
        position: absolute;
        width: 15%;
    }

    .select-sort {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-right: 10px;
        cursor: pointer;
    }

    .sort-selected {
        height: 20px;
        width: 155px;
        border-radius: 0px 0px 0px 0px;
        top: 150px;
        left: 470px;
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

        .select-sort:hover {
            display: flex;
            background-color: #2038AD;
        }


    .sort-menu {
        width: 155px;
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        border-radius: 30px;
        color: black;
        margin: 15px;
        top: 240px;
        left: 470px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: none;
        transition: 0.2s;
        z-index: 1;
    }

        .sort-menu li {
            padding: 8px 16px;
            cursor: pointer;
        }

            .sort-menu li:hover {
                background-color: #2043D5;
                color: #fff;
                border-radius: 30px;
            }

    a.sort-active {
        background-color: #2043D5;
        color: #fff;
    }

        a.sort-active:hover {
            background-color: #2038AD;
            color: #fff;
        }


    .sort-menu-open {
        display: block;
        opacity: 1;
    }

    .container-cards {
        height: auto;
        width: auto;
        border-radius: 50px;
        background-color: #EFF5FF;
        position: absolute;
        top: 410px;
        left: 300px;
        transform: translate(-50%, -50%);
        overflow: visible;
        display: flex;
        gap: 50px 50px;
        padding: 0px;
    }

        .container-cards > div {
            border: 4.5px solid #2043D5;
            border-radius: 50px;
            background-color: #EFF5FF;
            padding: 20px 20px;
            flex: 1;
            flex-direction: row;
            overflow: hidden;
            justify-content: space-between;
            flex-direction: row;
            display: flex;
            align-items: center;
        }   

    .card1-pic {
        height: 330px;
        width: 200px;
        border: 1px solid #2043D5;
        border-radius: 25px;
        overflow: hidden;
    }
    .card1-details {
        height: 330px;
        width: 270px;
        margin: 10px;
        overflow: auto;
        justify-content: space-evenly;
    }
    .header1 {
        font-family: "Linden Hill", serif;
        font-weight: 400;
        font-style: normal;
        white-space: nowrap;
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
    .detail-label1 {
        font-family: "Libre Franklin", sans-serif;
        font-weight: 400;
        font-style: normal;
        font-size: 12px;
    }
    .dlabel-status {
        color: #2BC666;
    }
    .bookmarkbtn {
        position: static;
        display: inline-block;
        background: transparent;
        border: none !important;
        cursor: pointer;
        margin-left: 50px;
    }
    .fa-bookmark {
        color: #2043D5;
    }
        .fa-bookmark:hover {
            color: #5966EC;
        }
    .reserve-btn {
        height: 20px;
        width: 150px;
        text-align: center;
        border: 1px solid #2043D5;
        border-radius: 50px;
        background-color: #2043D5;
        color: #FFFFFF;
    }
        .reserve-btn:hover {
            height: 20px;
            width: 150px;
            text-align: center;
            border: 1px solid #5966EC;
            border-radius: 50px;
            background-color: #5966EC;
            color: #FFFFFF;
        }
    .seebook-btn {
        height: 20px;
        width: 100px;
        text-align: center;
        border: 1px solid #2043D5;
        border-radius: 50px;
        background-color: #FFFFFF;
        color: #2043D5;
    }
        .seebook-btn:hover {
            height: 20px;
            width: 100px;
            text-align: center;
            border: 1px solid #5966EC;
            border-radius: 50px;
            background-color: #5966EC;
            color: #FFFFFF;
        }
</style>
<script src="script/dropdownSearch.js" defer></script>
<script src="script/dropdownSortBy.js" defer></script>
<script src="script/reserveBooks.js" defer></script>
</html>
