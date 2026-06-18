<?php
session_start();
include "db-connect.php";
if (isset($_GET['id'])) {
    $instiEmail = $_GET['id'];

    // Fetch book details from the database
    $sql = "SELECT * FROM user_info WHERE Institutional_Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $instiEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set session variables or use the $row array directly
        $_SESSION['first_name'] = $row['First_Name'];
        $_SESSION['last_name'] = $row['Last_Name'];

    }

    $sqlCopies = "SELECT * FROM book_info WHERE Accession_Number = ?";
    $stmtCopies = $conn->prepare($sqlCopies);
    $stmtCopies->bind_param("s", $_SESSION['accession_number']);
    $stmtCopies->execute();
    $resultCopies = $stmtCopies->get_result();

    if ($resultCopies->num_rows > 0) {
        $row = $resultCopies->fetch_assoc();
        // Set session variables or use the $row array directly
        $_SESSION['book_title'] = $row['Book_Title'];
        $_SESSION['author'] = $row['Author'];
        $_SESSION['isbn'] = $row['ISBN'];

    }
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <title>LibTrack Homepage</title>
    </head>
    <body class='poppins-regular'>

        <div class="no-select container">
            <div class="container-header">
                <h1> View User <?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']);?></h1>
            </div>
            <div class="profile-navigation">
                <a class="profile-navigation-menu" href="ManageAccounts-ViewUser-Profile.php?id=<?php echo htmlspecialchars($instiEmail); ?>" target="profileContent">Info</a>
                <a class="profile-navigation-menu" href="ManageAccounts-ViewUser-Loan.php?id=<?php echo htmlspecialchars($instiEmail); ?>" target="profileContent">Loaned</a>
                <a class="profile-navigation-menu" href="ManageAccounts-ViewUser-Fines.php?id=<?php echo htmlspecialchars($instiEmail); ?>" target="profileContent">Fines</a>
                <a class="profile-navigation-menu" href="ManageAccounts-ViewUser-UserRestrictions.php?id=<?php echo htmlspecialchars($instiEmail); ?>" target="profileContent">User Restrictions</a>
                <a class="profile-navigation-menu" href="ManageAccounts-ViewUser-ActivityLog.php?id=<?php echo htmlspecialchars($instiEmail); ?>" target="profileContent">Activity Log</a>

                <div class="dropdown" style="margin-left: 20px;">
                    <button class="dropdown-button" onclick="toggleDropdown()"><i class="bi bi-gear-fill"></i> Action ▼</button>
                    <div class="dropdown-content" id="dropdownMenu">
                        <a href="#" style="cursor:pointer;">Suspend for 3 Days</a>
                        <a href="#" style="cursor:pointer;">Suspend for 7 Days</a>
                        <a href="#" style="cursor:pointer;">Temporary Ban</a>
                        <a href="#" style="cursor:pointer;">Lift Suspension</a>
                    </div>
                </div>
            </div>

           
            <iframe src="ManageAccounts-ViewUser-Profile.php?id=<?php echo htmlspecialchars($instiEmail); ?>" class="profile-iframe" name="profileContent"></iframe>

        </div>
    </body>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            flex-direction: column;
        }

        .no-select {
            -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Old versions of Firefox */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
        }

        .center {
            display: block;
            padding: 40px;
            margin-left: auto;
            margin-right: auto;
            width: 45%;
        }

        .description {
            font-size: 14px;
            text-align: center;
            width: 90%;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 700px;
            width: 90%;
            border: 10px solid #2043D5;
            border-radius: 30px;
            margin: 10px;
        }

        .container-header {
            background-color: #2043D5;
            color: #fff;
            width: 100%;
            border-radius: 10px 10px 0px 0px;
            text-indent: 20px;
        }

        .profile-navigation {
            display: flex;
            align-items: start;
            display: table-row;
            width: 95%;
            padding: 10px;
        }

        a.profile-navigation-menu {
            padding: 10px 30px 10px 30px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }

            a.profile-navigation-menu:hover {
                border-bottom: 2px solid #2043D5;
            }

        .profile-iframe {
            border: none;
            border-radius: 30px;
            height: 650px;
            width: 100%;
            flex: 1;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-button {
            background: none;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #333;
            padding: 5px 10px;
            margin-left: 170px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 10;
        }

            .dropdown-content a {
                display: block;
                padding: 10px;
                text-decoration: none;
                color: #333;
                font-size: 14px;
            }

                .dropdown-content a:hover {
                    background: #f1f1f1;
                }

        .show {
            display: block;
        }

    </style>
    <script src="script/patronDateTime.js" defer></script>
    <script src="script/ManageAccounts-DropdownAction.js"></script>

</html>
<title></title>
</head>
<body>

</body>
</html>