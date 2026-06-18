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
		<div class="sidebar">
			<div class="no-select sidebar-menu">
				<a class="description">Get to know Libtrack</a>
                <a class="options">Sign Ups</a>
                <a class="options">Forgot Password</a>
                <a class="options">Change Password</a>
                <a class="options">Update Account Details</a>
                <a class="options">Borrow Books</a>
                <a class="options">Return Books</a>
			</div>
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
			position: absolute;
			width: 96%;
			height: 6%;
			background-color: #2038AD;
			color: white;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 2%;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		}
		.sidebar {
			position: fixed;
			top: 1.5%;
			width: 300px;
			height: 100%;
			box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
		}
		.content {
			border: none;
			margin-top: 100px;
			margin-left: 300px;
			flex: 1;
		}
		.user-icons {
			display: none;
			justify-content: space-between;
			align-items: center;
			padding-right: 50px;
		}

        .description {
		  color: black;
		  text-decoration: none;
		  padding: 15px 30px;
		  display: block;
		  cursor: pointer
		}

        .description:hover {
		  text-decoration: none;
		}

		.options {
		  color: black;
		  text-decoration: none;
		  padding: 7.5px 15px;
          text-indent: 40px;
		  display: block;
		  cursor: pointer
		}
		.options:hover {
			background-color: #2038AD;
            color: white;
			text-decoration: underline;
		}
	</style>
	<script src="script/dropdownSidebar.js">
	</script>
</html>
