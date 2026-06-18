<?php
session_start();
include 'db-connect.php';

if (isset($_POST['userloanedbooks'])) {
    $stmt = $conn->prepare("
    SELECT 
        ui.First_Name, 
        ui.Last_Name, 
        ui.Institutional_Email, 
        ui.Contact_No, 
        ui.Username, 
        ui.Campus, 
        ui.Online_Date, 
        uai.Total_Loaned, 
        uai.Total_Fines, 
        uai.Total_Restrictions 
    FROM 
        user_info ui 
    JOIN 
        user_accounts_info uai 
        ON uai.Email = ui.Institutional_Email 
    ORDER BY 
        uai.Total_Loaned DESC;
    ");
} elseif (isset($_POST['userfinebooks'])) {
    $stmt = $conn->prepare("
    SELECT 
        ui.First_Name, 
        ui.Last_Name, 
        ui.Institutional_Email, 
        ui.Contact_No, 
        ui.Username, 
        ui.Campus, 
        ui.Online_Date, 
        uai.Total_Loaned, 
        uai.Total_Fines, 
        uai.Total_Restrictions 
    FROM 
        user_info ui 
    JOIN 
        user_accounts_info uai 
        ON uai.Email = ui.Institutional_Email 
    ORDER BY 
        uai.Total_Fines DESC;
    ");
} elseif (isset($_POST['userrestrictionsbooks'])) {
    $stmt = $conn->prepare("
    SELECT 
        ui.First_Name, 
        ui.Last_Name, 
        ui.Institutional_Email, 
        ui.Contact_No, 
        ui.Username, 
        ui.Campus, 
        ui.Online_Date, 
        uai.Total_Loaned, 
        uai.Total_Fines, 
        uai.Total_Restrictions 
    FROM 
        user_info ui 
    JOIN 
        user_accounts_info uai 
        ON uai.Email = ui.Institutional_Email 
    ORDER BY 
        uai.Total_Restrictions DESC;
    ");
} else  {
    $stmt = $conn->prepare("
    SELECT 
        ui.First_Name,
        ui.Last_Name,
        ui.Institutional_Email,
        ui.Contact_No,
        ui.Username,
        ui.Campus,
        ui.Online_Date,
        uai.Total_Loaned,
        uai.Total_Fines,
        uai.Total_Restrictions
    FROM 
        user_info ui
    JOIN 
        user_accounts_info uai 
    ON 
        uai.Email = ui.Institutional_Email
    ");
}

$stmt->execute();
$result = $stmt->get_result();

function getUserStatus($onlineDate)
{
    if (empty($onlineDate)) { // Check if the date is null or empty
        return "Inactive"; // Automatically mark as inactive
    }

    $currentDate = new DateTime(); // Current date
    $userOnlineDate = new DateTime($onlineDate); // Convert Online_Date to DateTime object
    $difference = $currentDate->diff($userOnlineDate); // Get the difference between the dates

    // Check if the difference exceeds one month
    if ($difference->m >= 1 || $difference->y > 0) { // If months >= 1 or years > 0
        return "Inactive";
    } else {
        return "Active";
    }
}

// Count the total users
$total_users_query = "SELECT COUNT(*) AS total_users FROM user_info";
$total_stmt = $conn->prepare($total_users_query);
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_users = ($total_result && $row = $total_result->fetch_assoc()) ? $row["total_users"] : 0;



$check_query2 = "SELECT 
    (SELECT COUNT(*) FROM user_accounts_info WHERE Total_Loaned > 0) AS cnt_loan, 
    (SELECT COUNT(*) FROM user_accounts_info WHERE Total_Fines > 0) AS cnt_fines, 
    (SELECT COUNT(*) FROM user_accounts_info WHERE Total_Restrictions > 0) AS cnt_restrictions";

$stmt_check2 = $conn->prepare($check_query2);
$stmt_check2->execute();
$result2 = $stmt_check2->get_result();

// Check for valid query execution and fetch results
if ($result2 && $row = $result2->fetch_assoc()) {
    $loan = $row["cnt_loan"];
    $fines = $row["cnt_fines"];
    $restrictions = $row["cnt_restrictions"];
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <title>LibTrack</title>
</head>

<body class='poppins-regular'>
    <div class="maincontainer">

        <div class="book-info">
            <div class="container-cards">
                <div class="card1">

                    <div class="bd-button-container">

                        <div class="label-bdbc-container">
                            <span class="label-bdbc">Accounts Dashboard</span>
                        </div>

                        <div class="buttons-bdbc-container">
                            <button class="button-genrep" onclick="location.href = 'ManageAccounts-GenerateReport.php';"><i class="bi bi-file-earmark-text" style="font-size: 16px;"></i> Generate Report</button>
                        </div>


                    </div>

                    <form class="cards-bdetails" method="POST">
                        <div class="container-bdcardcon1">
                            <button class="avbooks-container" type="submit" name="totalstudents">
                                <div class="label-avbooks-container">
                                    <span class="label-bdcardcon">Total Student Accounts</span>
                                </div>
                                <div class="label-avbookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $total_users ?></span>
                                </div>
                            </button>

                            <button class="borbooks-container" type="submit" name="userloanedbooks">
                                <div class="label-borbooks-container">
                                    <span class="label-bdcardcon">Users with loaned Books</span>
                                </div>
                                <div class="label-borbookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $loan ?></span>
                                </div>
                            </button>

                            <button class="resbooks-container" type="submit" name="userfinebooks">
                                <div class="label-resbooks-container">
                                    <span class="label-bdcardcon">Users with Fines</span>
                                </div>
                                <div class="label-resbookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $fines ?></span>
                                </div>
                            </button>

                            <button class="wobooks-container" type="submit" name="userrestrictionsbooks">
                                <div class="label-wobooks-container">
                                    <span class="label-bdcardcon">Users with Restrictions</span>
                                </div>
                                <div class="label-wobookscount-container">
                                    <span class="label-bdcardcon1"><?php echo $restrictions ?></span>
                                </div>
                            </button>
                        </div>
                    </form>

                </div>


            </div>

            <div class="container-cards1">
                <div class="card3">
                    <div class="biblio-container1">
                        <div class="biblio-container1-bd1">
                            <div class="mb-label">
                                <span class="label-mb-label">
                                    Name <i class="bi bi-arrows-vertical" data-sort="name" style="cursor: pointer;"></i>
                                </span>
                                <span class="label-mb-label1">Email</span>
                                <span class="label-mb-label2">Phone</span>
                                <span class="label-mb-label3">
                                    Username <i class="bi bi-arrows-vertical" data-sort="username" style="cursor: pointer;"></i>
                                </span>
                                <span class="label-mb-label4">
                                    Campus <i class="bi bi-arrows-vertical" data-sort="campus" style="cursor: pointer;"></i>
                                </span>
                                <span class="label-mb-label5">
                                    Status <i class="bi bi-arrows-vertical" data-sort="status" style="cursor: pointer;"></i>
                                </span>
                                <span class="label-mb-label6"><i class="bi bi-journal-check"></i></span>
                                <span class="label-mb-label7"><i class="bi bi-credit-card"></i></span>
                                <span class="label-mb-label8"><i class="bi bi-person-exclamation"></i></span>
                            </div>
                            <div id="book-container" class="mb-book-container">
                                <?php
                                if ($result && $result->num_rows > 0): ?>
                                    <?php while ($user = $result->fetch_assoc()):
                                        $status = getUserStatus($user["Online_Date"]); ?>
                                        <div class="mb-label-users">
                                            <div class="container-uaccname">
                                                <span onclick="location.href = 'ManageAccounts-ViewUser.php';"><?= $user["First_Name"] . ' ' . $user["Last_Name"] ?></span>
                                            </div>
                                            <div class="container-uaccemail">
                                                <span><?= $user["Institutional_Email"] ?></span>
                                            </div>
                                            <div class="container-uaccphone">
                                                <span><?= $user["Contact_No"] ?></span>
                                            </div>
                                            <div class="container-uaccusername">
                                                <span><?= $user["Username"] ?></span>
                                            </div>
                                            <div class="container-uacccampus">
                                                <span><?= $user["Campus"] ?></span>
                                            </div>
                                            <div class="container-uaccstatus">
                                                <?php if ($status != "Active") : ?>
                                                    <span class="container-uaccstatus-inactive"> <?php echo $status; ?> </span>
                                                <?php else: ?>
                                                    <span class="container-uaccstatus-active"> <?php echo $status; ?> </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="container-uaccloan">
                                                <span><?= htmlspecialchars($user['Total_Loaned']) ?></span>
                                            </div>
                                            <div class="container-uaccfine">
                                                <span><?= htmlspecialchars($user['Total_Fines']) ?></span>
                                            </div>
                                            <div class="container-uaccrestrict">
                                                <span><?= htmlspecialchars($user['Total_Restrictions']) ?></span>
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


    </div>
</body>
<style>
    body {
        background-color: #EFF5FF;
        margin: 0;
        display: flex;
    }

    .no-select {
        -webkit-touch-callout: none;
        /* iOS Safari */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror HTML */
        -moz-user-select: none;
        /* Old versions of Firefox */
        -ms-user-select: none;
        /* Internet Explorer/Edge */
        user-select: none;
        /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
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
        top: 555px;
        left: 630px;
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

    .container-cards>div.card1 {
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

    .container-cards>div.card2 {
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

    .container-cards1>div.card3 {
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
        width: 1128px;
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
        margin-left: 130px;

    }

    .label-mb-label2 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 180px;

    }

    .label-mb-label3 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 90px;
        cursor: pointer;
    }

    .label-mb-label4 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 57px;
        cursor: pointer;
    }

    .label-mb-label5 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 50px;
        cursor: pointer;
    }

    .label-mb-label6 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 47px;
        cursor: pointer;
    }

    .label-mb-label7 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 35px;
        cursor: pointer;
    }

    .label-mb-label8 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin-left: 33px;
        cursor: pointer;
    }

    .mb-book-container {
        height: 530px;
        width: 1123px;
        border: 1px solid #2043D5;
        overflow: auto;
        border-radius: 0px 0px 25px 25px;
    }

    .mb-label-users {
        width: 1320px;
        height: auto;
        white-space: nowrap;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .container-uaccname {
        height: auto;
        width: 204px;
        text-align: start;
        margin: 15px 0px 15px 15px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #2043D5;
        cursor: pointer;
    }

    .container-uaccemail {
        height: auto;
        width: 221px;
        text-align: start;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 15px 0px 15px 0px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #2043D5;
        cursor: pointer;
    }

    .container-uaccphone {
        height: auto;
        width: 106px;
        text-align: start;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 15px 0px 15px 0px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-uaccusername {
        height: auto;
        width: 165px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 15px 0px 15px 0px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-uacccampus {
        height: auto;
        width: 132px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 15px 0px 15px 0px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-uaccstatus {
        height: auto;
        width: 150px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 15px 0px 15px 0px;
    }

    .container-uaccstatus-active {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #2BC666;
    }

    .container-uaccstatus-inactive {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        color: #FF0202;
    }

    .container-uaccloan {
        height: auto;
        width: 40px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-uaccfine {
        height: auto;
        width: 50px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-uaccrestrict {
        height: auto;
        width: 50px;
        text-align: center;
        margin: 15px 0px 15px 0px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
    }

    .container-bdcardcon1 {
        width: 1100px;
        display: grid;
        grid-template-columns: auto auto auto auto;
        justify-content: space-around;
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

    .label-avbooks-container,
    .label-resbooks-container,
    .label-borbooks-container,
    .label-wobooks-container {
        text-align: center;
        margin: 16px 0px 0px 0px;
    }

    .label-avbookscount-container,
    .label-resbookscount-container,
    .label-borbookscount-container,
    .label-wobookscount-container {
        text-align: end;
        margin: 0px 32px 0px 0px;
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

    .bd-button-container,
    .bd-button-container1 {
        height: auto;
        width: 1125px;
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
        padding: 0px 134px;
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

    .button-acccreat {
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



    .label-bdbc-container {
        margin: 0px 0px 0px 40px;
    }

    .buttons-bdbc-container {
        margin: 0px 0px 0px 250px;
    }


    ::-webkit-file-upload-button {
        display: none;
    }
</style>
<script src="script/dropdownSearch.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("book-container");
        const icons = document.querySelectorAll(".bi-arrows-vertical");

        // Track sorting state for each column
        const sortStates = {
            name: "ASC",
            username: "ASC",
            campus: "ASC",
            status: "ASC"
        };

        icons.forEach(icon => {
            icon.addEventListener("click", () => {
                const sortType = icon.getAttribute("data-sort");
                const rows = Array.from(container.querySelectorAll(".mb-label-books"));

                // Determine the current sort direction or initialize it
                sortStates[sortType] = sortStates[sortType] === "ASC" ? "DESC" : "ASC";
                const direction = sortStates[sortType];

                // Sort rows based on the data attribute
                rows.sort((a, b) => {
                    const valueA = a.getAttribute(`data-${sortType}`).toLowerCase();
                    const valueB = b.getAttribute(`data-${sortType}`).toLowerCase();

                    if (valueA < valueB) return direction === "ASC" ? -1 : 1;
                    if (valueA > valueB) return direction === "ASC" ? 1 : -1;
                    return 0;
                });

                // Clear the container and re-append sorted rows
                container.innerHTML = "";
                rows.forEach(row => container.appendChild(row));

                // Update icon to reflect sort direction
                icons.forEach(i => i.className = "bi bi-arrows-vertical"); // Reset all icons
                icon.className = direction === "ASC" ? "bi bi-arrow-up" : "bi bi-arrow-down";
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.querySelector(".search-text");
        const dropdownMenu = document.querySelector(".dropdown-menu");
        const selectedType = document.querySelector(".selected");
        const dropdownItems = dropdownMenu.querySelectorAll("li");

        // Handle dropdown selection
        dropdownItems.forEach(item => {
            item.addEventListener("click", () => {
                dropdownItems.forEach(i => i.classList.remove("active"));
                item.classList.add("active");
                selectedType.textContent = `Type: ${item.textContent}`;
                dropdownMenu.classList.remove("menu-open");
            });
        });

        // Toggle dropdown menu
        document.querySelector(".select").addEventListener("click", () => {
            dropdownMenu.classList.toggle("menu-open");
        });

        // Handle search functionality
        searchInput.addEventListener("input", () => {
            const query = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll(".mb-label-users");

            rows.forEach(row => {
                const name = row.querySelector(".container-uaccname span").textContent.toLowerCase();
                const email = row.querySelector(".container-uaccemail span").textContent.toLowerCase();
                const phone = row.querySelector(".container-uaccphone span").textContent.toLowerCase();
                const username = row.querySelector(".container-uaccusername span").textContent.toLowerCase();
                const campus = row.querySelector(".container-uacccampus span").textContent.toLowerCase();

                if (
                    name.includes(query) ||
                    email.includes(query) ||
                    phone.includes(query) ||
                    campus.includes(query)
                ) {
                    row.style.display = "flex";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>

</html>