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
		<div class="no-select favorites-content">
            <div class="favorites-header">
                <h1 class="poppins-bold"> Favorites </h1>
                <hr>
                <h2 class="poppins-bold"> Books (6) </h2>
            </div>
            <div class="favorites-info">
                <div class="favorites-info-content">
                    <i class="favorites-option fa-solid fa-ellipsis-vertical"></i>
                    <p class="favorites-title">Book Lovers</p>
                    <p class="favorites-author">Emily Henry</p>
                    <p class="favorites-comment">Book Lovers is a witty, heartwarming romance about Nora Stephens, a cutthroat literary agent whose life revolves around books and her career.</p>
                    <hr class="breakdown">
                </div>
            </div>
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
		.favorites-content {
			display: flex;
			flex-direction: column;
			align-items: center;
            height: 600px;
            width: 98%;
            margin: 5px;
		}
        .favorites-header{
            color: black;
            width: 100%;
            border-radius: 10px 10px 0px 0px;
            text-indent: 20px;
        }
        .favorites-title{
            color: #2043D5;
            width: 100%;
            font-size: 20px;
        }
        .favorites-comment{
            width: 60%;
        }
        .favorites-option {
            float: right;
            font-size: 20px;
            margin-right: 20px;
            cursor: pointer;
        }
        hr {
            border: 2px solid #2043D5;
            width: 96.5%;
        }
        .breakdown {
            border: 1px solid #2043D5;
            width: 100%;
        }
		::-webkit-scrollbar {
			display: none;
		}
	</style>
    <script src="script/patronDateTime.js" defer></script>
</html>