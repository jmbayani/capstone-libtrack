<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
	</head>
	<body class='poppins-regular'>
		<header class = "no-select">
			<img class="header-spaces" src="img/libtrack-logo.png" alt="LibTrack Logo" width="300" height="100">
		</header>

		<div class="sidebar">
			<div class="no-select sidebar-menu">
				<a href="BorrowBookPage.php" target="otherFrame">Check-Out Books</a>
				<a href="ReturnBookPage.php" target="otherFrame">Check-In Books</a>
                <a href="PatronAttendance.php" target="otherFrame">Patron Attendance</a>
			</div>
		</div>

		<iframe src="PatronAttendance.php" class="content" name="otherFrame" height="700px" width="100%" title="Patron Attendance"></iframe>
		
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
		.header-spaces{
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
		.content {
		  border: none;
		  margin-top: 100px;
		  margin-left: 300px;
		  flex: 1;
		}
	</style>
	<script src="script/dropdownSidebar.js">
	</script>
</html>
