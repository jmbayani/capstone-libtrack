<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
		<title>Create New Password</title>
	</head>
	<body class='poppins-regular'>
        <div class="back-container">
		    <a class="button-back poppins-regular" href="LoginPage.php">Back</a>
        </div>
        <div class="content">
            <img class="check-img" src="img/check.png" alt="">
            <h1 class="lilita-one-regular">Password Changed <br> Successfully!!</h1>
            <div class="return-container">
                <p>Back to <a class="libre-franklin-regular return-link">Log in</a></p>
            </div>
        </div>
    <script>
    </script>
	</body>
	<style>
		body {
            background-color: #2038AD;
            margin: 0;
            display: flex;
            align-items: center;
            flex-direction: column;
		}
        h1{
            text-align: center;
            font-size: 50px;
            margin-bottom: 140px;
        }
		.content {
            border-radius: 100px;
            width: 50%;
            height: auto;
            margin: 20px;
            background-color: #EFF5FF;
		}
        .check-img {
            padding-left: 37%;
            padding-top: 15%;
            padding-bottom: 5%;
            width: 25%;
        }
		.button-back {
            display: none;
		}
        .return-container {
            padding-top: 3%;
            padding-bottom: 3%;
            text-align: center;
        }
        .return-link{
            color: #2043D5;
            text-decoration: none;
            margin: 2px 0px;
            cursor: pointer;
        }
        .return-link:hover{
            text-decoration: underline;
        }
	</style>
</html>
