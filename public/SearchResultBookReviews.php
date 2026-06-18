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
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>

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

                <button class="search1" onclick="location.href='HomePage.php'">Library search</button>
                <label class="searchiconlabel">></label>
                <label class="searchlabel" onclick="location.href='SearchResultBooks.php'">Search Results</label>
                <label class="searchiconlabel1">></label>

                <div class="booklblp">
                    <label class="searchlabel-book"><?php echo $_SESSION['book_title'];?></label>
                </div>
            </div>
        </form>

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
                <span>Ratings and Reviews</span>
            </div>

            <div class="container-cards1">
                <div class="card3">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd">
                            <div class="review-rates">
                                <div>
                                    <div class="user-rating1">
                                        <span class="review-count">4.0</span>
                                        <i class="fa fa-star rating-checked" style="font-size:40px"></i>
                                        <i class="fa fa-star rating-checked" style="font-size:40px"></i>
                                        <i class="fa fa-star rating-checked" style="font-size:40px"></i>
                                        <i class="fa fa-star rating-checked" style="font-size:40px"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="rr-label">100 Ratings</span>
                                    <i class="bi bi-dot" style="font-size:15px"></i>
                                    <span class="rr-label">12 Reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card4">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd1">

                            <div class="userreview-container">
                                <div>
                                    <div class="review-ureview">
                                        <div class="container-srating">
                                            <i class="fa fa-star rating-checked" style="font-size:16px"></i>
                                            <i class="fa fa-star rating-checked" style="font-size:16px"></i>
                                            <i class="fa fa-star rating-checked" style="font-size:16px"></i>
                                            <i class="fa fa-star rating-checked" style="font-size:16px"></i>
                                            <span class="review-labelitalic">2 months ago</span>
                                        </div>
                                        <div class="container-rtitle">
                                            <span class="review-labelbold">Forever</span>
                                        </div>
                                        <div class="container-rbody">
                                            <span class="review-label">
                                                Book Lovers by Emily Henry is a light-hearted, funny read that captures the world of books and romance.
                                                Nora, a no-nonsense literary agent, ends up on an unexpected journey of self-discovery alongside her bookish rival, Charlie.
                                                Their chemistry is fun, and I enjoyed seeing them bond over books.
                                                At the same time, Nora’s relationship with her sister adds depth, making it more than just a love story.
                                                It’s a feel-good book with great humor and relatable characters that make you think about family, ambition, and love.
                                                Overall, a perfect, easy read for book enthusiasts.
                                            </span>
                                        </div>
                                        <div class="container-ruser">
                                            <span class="review-label">Reviewed by <span class="review-username">Juan Dela Cruz</span></span>
                                        </div>

                                    </div>
                                    <hr class="hrstyle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card5">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd2">
                            <div class="review-userrates">
                                <form>
                                    <label class="label-ureview">Write Your Review Here</label><br>
                                    <div class="con-ratingform">
                                        <label class="label-ureview1">Rating:</label>
                                        <div class="star-rating animated-stars">
                                            <input type="radio" id="star4" name="rating" value="4">
                                            <label for="star4" class="bi bi-star-fill"></label>
                                            <input type="radio" id="star3" name="rating" value="3">
                                            <label for="star3" class="bi bi-star-fill"></label>
                                            <input type="radio" id="star2" name="rating" value="2">
                                            <label for="star2" class="bi bi-star-fill"></label>
                                            <input type="radio" id="star1" name="rating" value="1">
                                            <label for="star1" class="bi bi-star-fill"></label>
                                        </div>
                                        <br>
                                        <label class="label-ureview1">Subject:</label>
                                        <input class="input-ursubject" type="text" id="rsubject" name="rsubject" placeholder="Write your subject here ..."><br>
                                        <div class="comment-container">
                                        <label class="label-ureview2">Comment:</label>
                                        <textarea class="input-urbody" type="text" id="rcomment" name="rcomment" placeholder="Tell us about your reading experience with this book ..."></textarea>
                                        </div>
                                    </div>
                                    <button class="button-submit" type="submit">Submit</button>
                                </form>
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
        top: 640px;
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
        gap: 0px;
        padding: 0px;
        align-content: baseline;
        margin-top: 20px;
        margin-left: 20px;
    }

        .container-cards1 > div.card3 {
            display: flex;
            height: 110px;
            width: 750px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

        .container-cards1 > div.card4 {
            display: flex;
            height: 540px;
            width: 750px;
            background-color: #EFF5FF;
            overflow: hidden;
        }

        .container-cards1 > div.card5 {
            display: flex;
            height: 260px;
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

    .biblio-container2 {
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
        height: 540px;
        display: flex;
        flex-direction: column;
    }
    .biblio-container1-bd2 {
        height: 260px;
        display: flex;
        flex-direction: column;
    }

    .review-rates {
        height: 110px;
        width: 710px;
        border-radius: 25px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
    }

    .review-count {
        font-size: 40px;
        font-family: poppins;
        font-style: normal;
        font-weight: 600;
        text-align: center;
    }
    .rr-label {
        font-size: 16px;
        font-family: poppins;
        font-style: normal;
        font-weight: 400;
        text-align: center;
    }




    .userreview-container {
        height: 530px;
        width: 743px;
        border: 4px solid #2043D5;
        overflow: auto;
        border-radius: 25px 25px 25px 25px;
    }

    .review-ureview {
        width: 741px;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .review-label {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .review-labelbold {
        font-family: poppins;
        font-size: 28px;
        font-weight: 600;
    }
    .review-labelitalic {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        font-style:italic;
    }
    .review-username {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
    }


    .container-srating {
        height: auto;
        width: auto;
        text-align: start;
        margin: 20px 15px 0px;
    }

    .container-rtitle {
        height: auto;
        width: auto;
        text-align: start;
        margin: 0px 0px 15px 15px;
    }

    .container-rbody {
        height: auto;
        width: auto;
        text-align: start;
        margin: 0px 15px;
    }

    .container-ruser {
        height: auto;
        width: auto;
        text-align: start;
        margin: 15px 15px;
    }

    .hrstyle {
        width: 710px;
        margin: 2px 16px;
        height: 1.5px;
        border-width: 0;
        color: #2043D5;
        background-color: #2043D5;
    }

    .star-rating {
        direction: rtl;
        display: inline-block;
        cursor: pointer;
        margin-left: 35px;
    }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            font-size: 24px;
            padding: 0 2px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

            .star-rating label:hover,
            .star-rating label:hover ~ label,
            .star-rating input:checked ~ label {
                color: #ffc107;
            }

    .review-userrates {
        height: 260px;
        width: 710px;
        border-radius: 25px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .con-ratingform {
        margin-left:20px
    }

    .label-ureview {
        font-family: poppins;
        font-size: 18px;
        font-weight: 600;
    }
    .label-ureview1 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
    }
    .label-ureview2 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 600;
    }

    .input-ursubject {
        width: 580px;
        height: 25px;
        border: 3.5px solid #2043D5;
        border-radius: 10px;
        font-family: poppins;
        font-size: 16px;
        margin-bottom: 10px;
        margin-left: 25px;
    }
    .input-urbody {
        width: 580px;
        height: 100px;
        border: 3.5px solid #2043D5;
        border-radius: 10px;
        font-family: poppins;
        font-size: 16px;
        margin-bottom: 10px;
        margin-left: 8px;
        resize: none;
        overflow:auto;
    }

    .button-submit {
        height: 30px;
        width: 110px;
        background-color: transparent;
        border: 3.5px solid #2043D5;
        border-radius: 25px;
        color: #000000;
        padding: 0px 15px;
        margin: 0px 0px 0px 590px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }

    .comment-container {
        display: flex;
    }
</style>
<script src="script/dropdownSearch.js">


</script>
</html>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>

</body>
</html>