<?php
session_start();
	$user_role = $_SESSION['user_role'];
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || !isset($_SESSION['name']) || $user_role  !== 'Library Admin') {
    header("Location: LoginLibTrack.php");
    exit();
}
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
	</head>
	<body class='poppins-regular'>
		<header class = "no-select">
			<img class="header-spaces" src="img/libtrack-logo.png" alt="LibTrack Logo" width="300" height="100">
			<div class="user-display">
			<div class="notif-select">
					<div class="select-notif">
						<i class="icon fas fa-bell"><span class="notif-badge" id="notifCount"></span></i>
					</div>
					<div class="notif-menu">
						<div class="notif-header">
							Notifications
							<hr>
						</div>
						<div class="notif-content">
							<li onmouseover="showSettings(this)" onmouseout="hideSettings(this)">
								<b class="notif-font">Borrowed Book </b> <br> 
								<p class="notif-font">You have borrowed </p>
								<i class="notif-icon fa-solid fa-ellipsis-vertical"></i></li>
						</div>

						<div class="notif-footer">
							<hr>
							<button class="poppins-bold view-notif"> View All Notification </button>
						</div>
					</div>
				</div><i class="icon circle fas fa-user"></i>
				<table class = "user-info">
					<tr>
						<td class="user"><?php echo $_SESSION['name']; ?></td>
					</tr>
					<tr>
						<td class="type"><?php echo $_SESSION['user_role']; ?></td>
					</tr>
				</table>
				<div class="settings-select">
					<div class="select-settings">
						<i class="settings-selected icon fa-solid fa-gear"></i>		
					</div>
					<div class="settings-menu">
						<a class="settings-active settings-sidebar-item" href="MyProfileAdmin.php" target="adminFrame">My Profile</a>
						<a class="settings-sidebar-item" href="AdminUpdateAccount.php">Update Account Details</a>
						<a class="settings-sidebar-item" href="AdminChangePass.php">Change Password</a>
						<a class="settings-sidebar-item" id="logout" href="logout.php" >Log Out</a>
					</div>
				</div>
			</div>
		</header>

		<div class="sidebar">
			<div class="no-select sidebar-menu">
				<a href="ReservedBooks.php" target="adminFrame">Reserved Books</a>
                <a href="TransactionBooks.php" target="adminFrame">Transaction Books</a>
                <a href="ManageBooksDashboard.php" target="adminFrame">Manage Books</a>
                <a href="ManageFines.php" target="adminFrame">Manage Fines</a>
				<a href="MonitoringUser.php" target="adminFrame">Monitoring User</a>
                <a href="ManageAccountsDashboard.php" target="adminFrame">Manage Accounts</a>
				<a href="BookCirculation.php" target="adminFrame">Book Circulation</a>
				<a href="PatronLogs.php" target="adminFrame">Patron Logs</a>
			</div>
		</div>
		<iframe src="HomePage.php" class="content" name="adminFrame" height="700px" width="100%" title="LibTrack Admin"></iframe>
		
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
			justify-content: space-between;
			padding-left: 20px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
			z-index: 1000;
		}
		.sidebar {
			position: fixed;
			top: 100px;
			left: 0;
			width: 300px;
			height: calc(100% - 60px);
			background-color: #2043D5;
			box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
		}
		.content {
			border: none;
			margin-top: 100px;
			margin-left: 300px;
			flex: 1;
		}
		.user-display {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding-right: 50px;
		}
		.icon {
			font-size: 25px;
			padding: 0px 15px 0px 15px;
			cursor: pointer;
		}
		.icon.circle {
			width: 0px;
            height: 26px;
			margin: 0px 15px 0px 15px;
			font-size: 18px;
			display: flex;
            align-items: center;
            justify-content: center;
			border-radius: 50%;
			border: 3px solid #EFF5FF;
			cursor: pointer;
		}
		table.user-info {
			padding-right: 120px;
		}
		td.user, td.type {
			color: white;
			font-size: 14px;
			text-align: left;
		}
		.sidebar-menu a {
			color: white;
			text-decoration: none;
			padding: 15px 30px;
			display: block;
			cursor: pointer
		}
		.sidebar-menu a:hover {
			background-color: #2038AD;
			text-decoration: underline;
		}
		a.dropdown-sidebar-item {
			color: black;
			text-decoration: none;
		}
		a.dropdown-sidebar-item:hover {
			color: #fff;
		}
		.dropdown-select {
            position: relative;
        }
        .select {
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
			cursor: pointer;
			transition: 0.3s;
        }
        .dropdown-menu {
			background-color: #fff;
			border: 3px solid #2043D5;
			border-radius: 30px;
			color: black;
			position: absolute;
			top: 150%;
			left: -180%;
			width: 500%;
			transform: translateX(-50%);
			display: none;
			transition: 0.2s;
			z-index: 1;
        }
        
        .dropdown-menu a {
			padding: 8px 16px;
			cursor: pointer;
        }
        
        .dropdown-menu a:hover {
			background-color: #2043D5;
			color: #fff;
			border-radius: 30px;
        }
        
        .menu-open {
			display: flex;
			flex-direction: column;
			opacity: 1;
        }
		a.settings-sidebar-item {
			color: black;
			text-decoration: none;
		}
		a.settings-sidebar-item:hover {
			color: #fff;
		}
		.settings-select {
            position: relative;
        }
        .select-settings {
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
			cursor: pointer;
			transition: 0.3s;
        }
        .settings-menu {
			background-color: #fff;
			border: 3px solid #2043D5;
			border-radius: 30px;
			color: black;
			position: absolute;
			top: 150%;
			left: -180%;
			width: 500%;
			transform: translateX(-50%);
			display: none;
			transition: 0.2s;
			z-index: 1;
        }
        
        .settings-menu a {
			padding: 8px 16px;
			cursor: pointer;
        }
        
        .settings-menu a:hover {
			background-color: #2043D5;
			color: #fff;
			border-radius: 30px;
        }
        
        .settings-menu-open {
			display: flex;
			flex-direction: column;
			opacity: 1;
        }
		.notif-badge {
            position: absolute;
            top: -6px;
            right: 6px;
			width: 2px;
			height: 2px;
            background: #fff;
            color: #2043D5;
            font-size: 10px;
            border-radius: 50%;
            padding: 4px 4px;
        }
		.notif-header {
			margin: 10px;
			text-indent: 10px;
			border-top-left-radius: 30px;
			border-top-right-radius: 30px;
		}
		.notif-icon {
            position: absolute;
            right: 10px;
            display: none;
            cursor: pointer;
        }
		.notif-font {
			text-align: left;
			font-size: 12px;
			margin: 1px 0px 1px 0px;
		}
		.notif-footer {
			bottom: 10px;
			margin: 10px;
			text-indent: 10px;
			border-bottom-left-radius: 30px;
			border-bottom-right-radius: 30px;
		}
		.view-notif {
            position: static;
            margin: 2px 2px 2px 10px;
            padding: 2px 10px;
			font-size: 12px;
			color: black;
            border: 3px solid #2043D5;
			border-radius: 50px;
			text-decoration: none;
			cursor: pointer;
			transition: all 0.2s ease;
        }
        .view-notif:hover {
            background-color: #2043D5;
            color: #fff;
        }
		a.notif-sidebar-item {
			color: black;
			text-decoration: none;
		}
		a.notif-sidebar-item:hover {
			color: #fff;
		}
		.notif-select {
            position: relative;
        }
        .select-notif {
			display: flex;
			justify-content: space-between;
			align-items: flex-start;
			cursor: pointer;
			transition: 0.3s;
        }
        .notif-menu {
			background-color: #fff;
			border: 3px solid #2043D5;
			border-radius: 30px;
			color: black;
			position: absolute;
			top: 150%;
			left: -180%;
			width: 500%;
			height: 1750%;
			transform: translateX(-50%);
			display: none;
			transition: 0.2s;
			z-index: 1;
        }
        
        .notif-menu a {
			padding: 8px 16px;
			cursor: pointer;
        }
        
        .notif-menu a:hover {
			background-color: #2043D5;
			color: #fff;
			border-radius: 30px;
        }
        
        .notif-menu-open {
			display: flex;
			flex-direction: column;
			opacity: 1;
        }
		::-webkit-scrollbar {
			display: none;
		}
	</style>
	<script src="script/dropdownSettings.js"></script>
	<script src="script/dropdownNotif.js" defer></script>
	<script src="script/LogOut.js" defer></script>
</html>
