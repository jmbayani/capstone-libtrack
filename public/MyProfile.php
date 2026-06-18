<?php
session_start();

// Check if user is properly logged in (matches your login.php logic)
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || !isset($_SESSION['name'])) {
    header("Location: LoginLibTrack.php");
    exit();
}

// Database connection (reuse your existing db-connect.php)
include 'db-connect.php';

// Verify session against database (extra security)
$stmt = $conn->prepare("SELECT First_Name FROM user_info 
                       WHERE Institutional_Email = ? AND logged_in = 1");
$stmt->bind_param("s", $_SESSION['institutional_email']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Session hijacking detected - force logout
    session_unset();
    session_destroy();
    header("Location: LoginLibTrack.php?error=session_expired");
    exit();
}

$user = $result->fetch_assoc();
$firstName = explode(' ', $_SESSION['name'])[0]; // Gets first name from full name
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
		<title>LibTrack Homepage</title>
	</head>
	<body class='poppins-regular'>
		<div class="no-select container">
			<div class="container-header">
				<h1>Welcome Back, <?php echo htmlspecialchars($firstName); ?></h1>
			</div>
            <div class="profile-navigation">
                <a class="profile-navigation-menu" href="MyProfile-Info.php" target="profileContent">Info</a>
                <a class="profile-navigation-menu" href="MyProfile-Loaned.php" target="profileContent">Loaned</a>
                <a class="profile-navigation-menu" href="MyProfile-Fines.php" target="profileContent">Fines</a>
            </div>
            <iframe src="MyProfile-Info.php" class="profile-iframe" name="profileContent"></iframe>
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
            height: 600px;
            width: 90%;
            border: 10px solid #2043D5;
			border-radius: 30px;
            margin: 30px;
		}
        .container-header{
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
			color: #2038AD;
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
	</style>
    <script src="script/patronDateTime.js"  defer></script>
</html>