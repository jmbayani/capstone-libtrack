<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Reservation Book</title>
</head>
<body class='poppins-regular'>
    <div class="maincontainer">

        <div class="book-info">
            <div class="container-cards">
                <div class="card1">

                    <div class="cards-bdetails">

                        <div class="container-bdcardcon1">

                            <div>
                                <h1 class="label-bookcirculation">Reservation Book</h1>
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
                                    <button class="generate-btn" onclick="location.href = 'ReservationBook-GenerateReport.php';">Generate Report</button>
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
                                        <div class="borrowed-state">

                                            <div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">Book Title:</span>
                                                    <div>
                                                        <span class="mb-normallabelwc" onclick="location.href = 'ReservationBook-ReservedBook.html';">Book Lovers</span>
                                                    </div>
                                                </div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">Author:</span>
                                                    <div>
                                                        <span class="mb-normallabel">Emily Henry</span>
                                                    </div>
                                                </div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">ISBN:</span>
                                                    <div>
                                                        <span class="mb-normallabel">9823-42223-2</span>
                                                    </div>
                                                </div>
                                                <div class="container-firstcolumn">
                                                    <span class="mb-titlelabel">Accession No.:</span>
                                                    <div>
                                                        <span class="mb-normallabel">PCLIB-2024-001</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="container-secondcolumn">
                                                    <span class="mb-titlelabel">Reserved By:</span>
                                                    <div>
                                                        <span class="mb-normallabel">Doe, John Jana</span>
                                                    </div>
                                                </div>
                                                <div class="container-secondcolumn">
                                                    <span class="mb-titlelabel">Username:</span>
                                                    <div>
                                                        <span class="mb-normallabel">2021-101371</span>
                                                    </div>
                                                </div>
                                                <div class="container-secondcolumn">
                                                    <span class="mb-titlelabel">Email:</span>
                                                    <div>
                                                        <span class="mb-normallabel">2021-101371@rtu.edu.ph</span>
                                                    </div>
                                                </div>
                                                <div class="container-secondcolumn">
                                                    <span class="mb-titlelabel">Contact:</span>
                                                    <div>
                                                        <span class="mb-normallabel">01234567890</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="container-thirdcolumn">
                                                    <span class="mb-titlelabel">Reserved Date:</span>
                                                    <div>
                                                        <span class="mb-normallabel">11/01/2024</span>
                                                    </div>
                                                </div>
                                                <div class="container-thirdcolumn">
                                                    <span class="mb-titlelabel">Date to Pick Up: </span>
                                                    <div>
                                                        <span class="mb-normallabel">11/02/2024</span>
                                                    </div>
                                                </div>
                                                <div class="container-thirdcolumn">
                                                    <span class="mb-titlelabel">Extended Pick Up Date: </span>
                                                    <div>
                                                        <span class="mb-normallabel">-</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="container-fourthcolumn">
                                                    <span class="mb-titlelabel">Time:</span>
                                                    <div>
                                                        <span class="mb-normallabel">01:00 PM</span>
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
    </div>
</body>
<style>
    body {
        background-color: #EFF5FF;
        margin: 0;
        display: flex;
    }

    .maincontainer {
        height: 646px;
        width: 1194px;
        margin: 0;
        position: relative;
        top: 0px;
        left: 0px;
        background-color: #EFF5FF;
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

    .container-firstcolumn, .container-secondcolumn, .container-thirdcolumn, .container-fourthcolumn {
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: 20px;
        width: 250px;
    }

</style>
<script src="script/dropdownSearch.js"></script>
</html>
