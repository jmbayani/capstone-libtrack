<?php
session_start();

include 'db-connect.php';
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
        .popup {
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
			text-align: center;
		}
		.popup-buttons {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: row;
		}
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
        .close-btn, .login-btn  {
            margin: 10px;
            padding: 10px;
			border: 3px solid #2043D5;
            background: #fff;
            color: black;
            cursor: pointer;
            border-radius: 30px;
			transition: all 0.3s ease;
        }
		.close-btn:hover, .login-btn:hover {
			background-color: #2043D5;
			color: white;
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
		a.button-login {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 2px 50px;
			margin-left: 1100px;
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
		.user-display {
			display: none;
			justify-content: space-between;
			align-items: center;
			padding-right: 50px;
		}
		.icon {
			font-size: 25px;
			padding: 0px 15px 0px 15px;
			cursor: pointer;
		}
		.icon-settings {
			color: #fff;
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
		  text-indent: 20px;
		}

		a.dropdown-sidebar-item:hover {
		  text-decoration: underline;
		  color: #fff;
		}

		.dropdown-select {
            position: relative;
			width: 300px;
        }

        .select {
			display: flex;
			justify-content:space-between;
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
	<body class='poppins-regular'>
		<header class = "no-select">
			<div class="overlay" id="overlay"></div>
			<div class="popup" id="popup">
				<p class="lilita-one-regular popup-desc">You must log in first to proceed.</p>
				<div class="popup-buttons">
					<button class="login-btn" onclick="redirectLogin()">Login</button>
					<button class="close-btn" onclick="closePopup()">Close</button>
				</div>
			</div>		
			<img class="header-spaces" src="img/libtrack-logo.png" alt="LibTrack Logo" width="300" height="100">
			<a id="LoginBtn" class="button-login poppins-regular" href="LoginLibtrack.php">Log In</a>
			<div class="user-display">
				<a class="icon-settings" href="StudentReservedBooks.php" target="contentFrame"><i class="icon fa-solid fa-book"></i></a>
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
						<td class="user">Jane Doe</td>
					</tr>
					<tr>
						<td class="type">Student</td>
					</tr>
				</table>
				<div class="settings-select">
					<div class="select-settings">
						<i class="settings-selected icon fa-solid fa-gear"></i>		
					</div>
					<div class="settings-menu">
						<a class="settings-active settings-sidebar-item" href="MyProfile.php" target="contentFrame">My Profile</a>
						<a class="settings-sidebar-item" href="StudentReservedBooks.php" target="contentFrame">My Reserved Books</a>
						<a class="settings-sidebar-item" href="StudentFavorites.php" target="contentFrame">Favorites</a>
						<a class="settings-sidebar-item" href="StudentUpdateAccount.php">Update Account Details</a>
						<a class="settings-sidebar-item" href="StudentChangePass.php">Change Password</a>
						<a class="settings-sidebar-item" href="">Log Out</a>
					</div>
				</div>
			</div>
		</header>

		<div class="no-select sidebar">
			<div class="no-select sidebar-menu">
				<a class="options" href="HomePage.php" target="contentFrame">Home</a>
				<div>
					<div class="dropdown-select">
						<div class="select">
							<a class="selected">Services</a>
							<div class="arrow"></div>
						</div>
						<ul class="dropdown-menu" id="dropdown-menu">
							<a class="active dropdown-sidebar-item" href="SearchBooks.php" target="contentFrame">Search Books</a>
							<a class="dropdown-sidebar-item" id="studentLink1" href="StudentBorrowBookHistory.php" onclick="loginPopup()" target="contentFrame">Borrowed Books History</a>
							<a class="dropdown-sidebar-item" id="studentLink2" href="StudentReturnBookHistory.php" onclick="loginPopup()" target="contentFrame">Returned Books History</a>
						</ul>
					</div>
				</div>
				<a class="options" href="AboutLibTrack.php" target="contentFrame">About LibTrack</a>
				<a class="options" href="ContactPage.php" target="contentFrame">Contact Us</a>
				<a class="options" href="HelpPage.php" target="contentFrame">Help</a>
			</div>
		</div>

		<iframe src="HomePage.php" class="content" name="contentFrame" height="1000px" width="100%" title="LibTrack Home"></iframe>

	</body>
	<script src="script/dropdownSidebar.js" defer></script>
	<script src="script/dropdownSettings.js" defer></script>
	<script src="script/dropdownNotif.js" defer></script>
	<script src="script/popupPages.js" defer></script>
</html>

