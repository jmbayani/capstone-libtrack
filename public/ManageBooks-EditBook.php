 ﻿
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" />

    <link href="https://fonts.googleapis.com/css2?family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Libre Franklin:ital,wght@0,100..900;1,100..900&family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>

    <title>LibTrack</title>

</head>

<body>

    <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <h2 class="header-signup">Edit Book Details</h2>

        <div class="container-addimage">
            <div class="image-container" id="imageContainer">
                <span>Change Image</span>

            </div>

        </div>

        <div class="overlay" id="overlay">
            <div class="overlay-content">
                <input type="file" id="fileInput" accept="image/*" style="display: none;">
                <div class="buttons">
                    <button onclick="document.getElementById('fileInput').click()">Browse</button>
                    <button id="removeBtn">Remove</button>
                    <button id="cancelBtn">Cancel</button>

                </div>

            </div>

        </div>

        <div class="container-info">
            <form action=".php">
                <div class="info-details">

                    <label for="abtitle">Title</label><br>
                    <input class="abtitle" type="text" id="abtitle" name="abtitle" placeholder="Enter the title of the book" required><br>

                    <label for="abauthorname">Author Name</label><br>
                    <input class="abauthorname" type="text" id="abauthorname" name="abauthorname" placeholder="Enter the author's name" required><br>

                    <label for="abauthorcode">Author Code</label><br>
                    <input class="abauthorcode" type="text" id="abauthorcode" name="abauthorcode" placeholder="Enter the author's code" required><br>

                    <label for="abisbn">ISBN</label><br>
                    <input class="abisbn" type="text" id="abisbn" name="abisbn" placeholder="Enter the ISBN of the book" required><br>

                    <label for="abphysicaldesc">Physical Description</label><br>
                    <input class="abphysicaldesc" type="text" id="abphysicaldesc" name="abphysicaldesc" placeholder="Enter the physical description of the book" required><br>

                    <label for="absubjectid">Subject ID/Shelf Location</label><br>
                    <input class="absubjectid" type="text"><br>

                    <label for="abkeyword">Keyword</label><br>
                    <input class="abkeyword" type="text" id="abkeyword" name="abkeyword" placeholder="Enter the keyword of the book" required><br>

                    <label for="abpublisher">Publisher</label><br>
                    <input class="abpublisher" type="text" id="abpublisher" name="abpublisher" placeholder="Enter the publisher of the book" required><br>

                    <label for="abpublicationdate">Publication Date</label><br>
                    <input class="abpublicationdate" type="numeric" id="abpublicationdate" name="abpublicationdate" placeholder="Enter the publication date of the book" pattern="\d" title="Please enter numbers only" required><br>

                    <label for="abcopyright">Copyright</label><br>
                    <input class="abcopyright" type="text" id="abcopyright" name="abcopyright" placeholder="Enter the copyright" required><br>

                    <label for="ablanguage">Language</label><br>
                    <input class="ablanguage" type="text" id="ablanguage" name="ablanguage" placeholder="Enter the language of the book" required><br>

                    <label for="abbookdetails">Book Details</label><br>
                    <textarea class="abbookdetails" type="text" id="abbookdetails" name="abbookdetails" placeholder="Enter the details of the book" required></textarea><br>

                    <label for="abstatus">Status</label><br>
                    <input class="abstatus" type="text"><br>

                    <button class="submitbtn">Update</button>




                    <div class="search-book">
                        <div class="dropdown-select">
                            <div class="select">
                                <span class="selected">Choose a Subject ID/Shelf Location</span>
                                <div class="arrow"></div>

                            </div>
                            <ul class="dropdown-menu">

                                <li>Filipiniana</li>

                                <li>Reference</li>

                                <li>Circulation</li>

                                <li>Special Collection</li>

                                <li>Reserve</li>

                            </ul>

                        </div>

                    </div>

                    <div class="search-book1">
                        <div class="dropdown-select1">
                            <div class="select1">
                                <span class="selected1">Choose a status of the book</span>
                                <div class="arrow1"></div>

                            </div>
                            <ul class="dropdown-menu1">

                                <li>Available</li>

                                <li>Borrowed</li>

                                <li>Reserved</li>

                                <li>Weed-out</li>

                                <li>For Repair</li>

                            </ul>

                        </div>

                    </div>





                </div>

            </form>


        </div>

    </div>

</body>




<style>
    .button-back {
        width: 130px;
        height: 35px;
        position: fixed;
        left: 20px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 10px 0px 0px 10px;
        background-color: #EFF5FF;
        border: 3.5px solid #2043D5;
        color: #2043D5;
        border-radius: 15px;
        cursor: pointer;
    }


        .button-back:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }


    body {
        background-color: #2038AD;
    }


    .container-signup {
        height: 700px;
        width: 650px;
        border-radius: 50px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #EFF5FF;
        overflow: auto;
    }


    .container-info {
        padding-left: 40px;
        padding-right: 40px;
    }


    .header-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 40px;
        text-align: center;
    }


    .header1-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 25px;
    }


    .abtitle, .abauthorname, .abauthorcode, .abisbn, .abphysicaldesc, .abkeyword, .abpublisher, .abpublicationdate, .abcopyright, .ablanguage {
        width: 571px;
        height: 49px;
        border: 3px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }


    .absubjectid, .abstatus {
        width: 571px;
        height: 45px;
        border: 3.5px solid #EFF5FF;
        background-color: #EFF5FF;
        border-radius: 30px;
        margin-bottom: 10px;
    }


    .abbookdetails {
        width: 571px;
        height: 180px;
        border: 3px solid #2043D5;
        font-family: poppins;
        font-size: 16px;
        margin-bottom: 10px;
        overflow-wrap: break-word;
        word-break: break-word;
        overflow: hidden;
        resize: none;
        overflow: auto;
        padding: 15px;
    }


    input[type=number] {
        width: 571px;
        height: 49px;
        border: 3px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }


    input[type=numeric] {
        width: 571px;
        height: 49px;
        border: 3px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        text-indent: 25px;
        margin-bottom: 10px;
    }


    .info-details {
        font-family: "Linden Hill", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 20px;
    }


    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    ::-webkit-scrollbar {
        display: none;
    }



    input[type=text]:invalid, input[type=number]:invalid, input[type=numeric]:invalid, .abbookdetails:invalid {
        border: 3px solid #ff0000;
    }


    .submitbtn {
        background-color: #ffffff;
        color: #2043D5;
        text-align: center;
        margin: 30px 210px;
        border: 3.5px solid #2043D5;
        border-radius: 15px;
        cursor: pointer;
        width: 150px;
        height: 40px;
        font-size: 16px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
    }


        .submitbtn:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }


    .search-book {
        display: flex;
        flex-direction: column;
        align-items: center;
    }



    .dropdown-select {
        position: relative;
        width: 15%;
    }


    .select {
        height: 27px;
        width: 546px;
        border-radius: 30px;
        top: -861px;
        left: 150px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        border: 3px solid #ff0000;
        padding: 9px;
        text-indent: 20px;
        font-family: poppins;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }


    .select-clicked {
        border-radius: 0px;
        border: 3px solid #2043D5;
    }


    .arrow {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid black;
        margin-right: 20px;
        transition: 0.3s;
    }


    .arrow-rotate {
        transform: rotate(180deg);
    }


    .dropdown-menu {
        width: 565px;
        height: 200px;
        overflow: auto;
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        color: black;
        margin: 15px;
        top: -732px;
        left: 150px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: none;
        font-family: poppins;
        font-size: 16px;
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
                border-radius: 0px;
            }


    .menu-open {
        display: block;
        opacity: 1;
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
            background-color: lightgray;
            text-decoration: underline;
            color: black;
        }


    .selected:hover {
        display: block;
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




    .search-book1 {
        display: flex;
        flex-direction: column;
        align-items: center;
    }



    .dropdown-select1 {
        position: relative;
        width: 15%;
    }


    .select1 {
        height: 27px;
        width: 546px;
        border-radius: 30px;
        top: -130px;
        left: 150px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        border: 3px solid #ff0000;
        padding: 9px;
        text-indent: 20px;
        font-family: poppins;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }


    .select-clicked1 {
        border-radius: 0px;
        border: 3px solid #2043D5;
    }


    .arrow1 {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid black;
        margin-right: 20px;
        transition: 0.3s;
    }


    .arrow-rotate1 {
        transform: rotate(180deg);
    }


    .dropdown-menu1 {
        width: 565px;
        height: 200px;
        overflow: auto;
        list-style: none;
        padding: 0.2em 0.5em;
        background-color: #fff;
        border: 3px solid #2043D5;
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
        color: black;
        margin: 15px;
        top: -1px;
        left: 150px;
        position: absolute;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        display: none;
        font-family: poppins;
        font-size: 16px;
        transition: 0.2s;
        z-index: 1;
    }


        .dropdown-menu1 li {
            padding: 8px 16px;
            cursor: pointer;
        }


            .dropdown-menu1 li:hover {
                background-color: #2043D5;
                color: #fff;
                border-radius: 0px;
            }


    .menu-open1 {
        display: block;
        opacity: 1;
    }


    .dropdown-select1 {
        position: relative;
        width: 300px;
    }


    .select1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-right: 10px;
        cursor: pointer;
    }


        .select1:hover {
            display: flex;
            background-color: lightgray;
            text-decoration: underline;
            color: black;
        }


    .selected1:hover {
        display: block;
    }



    .arrow-rotate1 {
        transform: rotate(180deg);
    }


    .dropdown-menu1 {
        background-color: #f4f4f4;
        color: black;
        display: none;
        padding: 0;
        margin: 0;
        transition: 0.2s;
    }


    a1.active {
        background-color: #2043D5;
        color: #fff;
    }


        a1.active:hover {
            background-color: #2038AD;
            color: #fff;
        }


    .menu-open1 {
        display: block;
        opacity: 1;
    }







    .container-addimage {
        position: relative;
        text-align: center;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 140px;
    }


    .image-container {
        width: 120px;
        height: 120px;
        border: 2px dashed #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        background-color: white;
    }


        .image-container img {
            max-width: 100%;
            max-height: 100%;
            transition: transform 0.3s;
        }


    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }


    .overlay-content {
        background: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
    }


    .buttons button {
        margin: 10px;
        padding: 10px;
        cursor: pointer;
        border: 2px solid #2043D5;
        background-color: white;
        border-radius: 10px;
    }


        .buttons button:hover {
            background-color: #2043D5;
            color: white;
        }
</style>


<script src="script/dropdownSearch.js"></script>

<script src="script/AddImage.js"></script>

</html>
