<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
		<title>LibTrack Homepage</title>
	</head>
	<body class='no-select poppins-regular'>
		<div class="container">
			<img class="center" src="img/libtrack-logo-2.png" alt="LibTrack Logo">
			<p class="description"> 
				Welcome to LibTrack, an automated library management system designed to simplify and improve your library experience. 
				Our easy-to-use search tool allows you to quickly find books. 
				Whether checking availability, managing borrowed books, or exploring new titles, LibTrack makes it all efficient and hassle-free.
			</p>
		</div>
		<form class="search-book" action="SearchResultBooks.php" method="GET">
			<div class="search-container">
				<input class="poppins-regular search-text" type="text" placeholder="Search.." name="search-text" required>
				<select class="poppins-regular search-type" name="search-type" required>
					<option value="" disabled selected hidden>Type: </option>
					<option value="Title">Title</option>
					<option value="Genre">Genre</option>
					<option value="Author">Author</option>
					<option value="Subject">Subject</option>
					<option value="Accession_No">Accession No.</option>
				</select>
			</div>
			<button class="poppins-regular search-button" name="search">Search</button>
		</form>
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
			width: 100%;
		}
		.search-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 20px;
            width: 1000px;
		}
		.search-book{
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		input[type=text]{
			border: 3px solid #2043D5;
			border-radius: 30px 0px 0px 30px;
			padding: 11px 11px 11px 30px;
			margin: 5px 10px;
			float: left;
			width: 75%;
			cursor: pointer;
		}
		select {
			border-radius: 0px 30px 30px 0px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			background-color: #fff;
			border: 3px solid #2043D5;
			padding: 11px;
			cursor: pointer;
			transition: 0.3s;
        }
		button {
            width: 20%;
            background-color: #fff;
			color: #2043D5;
            border: 3px solid #2043D5;
            padding: 10px;
            margin: 5px 0;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.2s;
		}
        form.search-book button:hover {
            background-color: #2038AD;
			color: #fff
        }
		::-webkit-scrollbar {
			display: none;
		}
        .dropdown-select {
            position: relative;
            width: 15%;
        }

        .select {
			border-radius: 0px 30px 30px 0px;
			display: flex;
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
			list-style: none;
			padding: 0.2em 0.5em;
			background-color: #fff;
			border: 3px solid #2043D5;
			box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.2);
			border-radius: 30px;
			color: black;
			position: absolute;
			margin: 15px;
			top: 100%;
			left: 50%;
			width: 100%;
			transform: translateX(-50%);
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
	</style>
</html>
