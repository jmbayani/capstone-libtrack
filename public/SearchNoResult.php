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
    <title>Search Result</title>
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

                <a class="search1" href='SearchBooks.php'>Library search</a>
                <label class="searchiconlabel">></label>
                <label class="searchlabel">Search Results</label>

                <p class="parg1">Search results for <a class="att1">“<?php echo $_SESSION['search_text']; ?>”</a></p>

                <a class="att2">No Results Found</a>
                <br>
                <p class="parg2"> It looks like the word <a class="att3">"<?php echo $_SESSION['search_text']; ?>"</a> did not match any items.</p>
                <p class="parg3"> Try the following tips to improve your search results:</p>
                <ul class="parg4">
                    <li>Make sure that all words are spelled correctly.</li>
                    <br>
                    <li>Try using synonyms or related terms.</li>
                    <br>
                    <li>Use more general terms or fewer words.</li>
                </ul>
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
        top:0px;
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

    .search-book {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form.search-book input[type=text] {
        height: 20px;
        width: 900px;
        border: 3px solid #2043D5;
        border-radius: 30px 0px 0px 30px;
        padding: 11px 11px 11px 30px;
        top: 50px;
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
        height: 25px;
        width: 155px;
        border-radius: 0px 30px 30px 0px;
        top: 50px;
        left: 480px;
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
        font-family: "Poppins", sans-serif;
        font-style: normal;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 90px;
        left: 98px;
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
        left: 158px;
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
        left: 225px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .parg1 {
        font-family: poppins;
        font-size: 25px;
        position: absolute;
        top: 120px;
        left: 190px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .parg2 {
        font-family: poppins;
        font-size: 16px;
        position: absolute;
        top: 250px;
        left: 275px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .parg3 {
        font-family: poppins;
        font-size: 16px;
        position: absolute;
        top: 290px;
        left: 279px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
    .parg4 {
        font-family: poppins;
        font-size: 16px;
        position: absolute;
        top: 385px;
        left: 285px;
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
        font-weight:700;
        font-style: italic;

    }
    .att2 {
        font-family: poppins;
        font-size: 25px;
        font-weight: 700;
        position: absolute;
        top: 220px;
        left: 163px;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
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
        left: 1070px;
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
        left: 1055px;
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

</style>
<script src="script/dropdownSearch.js" defer></script>
<script src="script/dropdownSortBy.js" defer></script>
</html>
