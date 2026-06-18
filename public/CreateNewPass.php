<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
        <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,255;1,255&family=Lilita+One&family=Linden+Hill:ital@0;1&family=Marhey:wght@300..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Enter New Password</title>
	</head>
	<body class='poppins-regular'>
        <div class="back-container">
		    <a class="button-back poppins-regular" href="LoginPage.php">Back</a>
        </div>
        <div class="content">
            <h1 class="lilita-one-regular">Enter New Password</h1>
            <div class="label-container">
                <label class="linden-hill-regular create-pass-label">New Password</label>
            </div>
            <div class="password-container">
                <input class="poppins-regular enter-pass" type="password" id="create-pass" name="create-pass" placeholder="Enter your new password" required>
                <span><i id="create-pass-toggler" class="far fa-eye"></i></span>
            </div>
            <div class="label-container">
                <label class="linden-hill-regular reenter-pass-label">Re-Enter Password</label>
            </div>
            <div class="password-container">
                <input class="poppins-regular reenter-pass" type="password" id="reenter-pass" name="create-pass" placeholder="Re-enter your new password" required>
                <span><i id="reenter-pass-toggler" class="far fa-eye"></i></span>
            </div>
            <div class="button-container">
                <button class="confirm-pass poppins-regular" >Confirm</button>
            </div>
        </div>
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
        .password-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0px 0px 10px;
        }
        .enter-pass{
            border: 3px solid #2043D5;
            border-radius: 30px;
            padding: 5px 5px 5px 30px;
            margin: 5px 10px;
            width: 75%;
            cursor: pointer;
		}
        .reenter-pass{
            border: 3px solid #2043D5;
            border-radius: 30px;
            padding: 5px 5px 5px 30px;
            margin: 5px 10px;
            width: 75%;
            cursor: pointer;
		}
        button.confirm-pass {
            width: 20%;
            background-color: #fff;
			color: #2043D5;
            border: 3px solid #2043D5;
            padding: 10px;
            margin: 60px 0;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.2s;
		}
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 100px;
            margin-bottom: 100px;
        }
		.button-back {
            position: fixed;
            left: 20px;
            padding: 2px 50px;
            display: block;
            font-size: 16px;
            margin: 10px 0px 0px 10px;
            font-weight: bold;
            background-color: #EFF5FF;
            border: 5px solid #2043D5;
            color: #2043D5;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
		}
		.button-back:hover {
            background-color: #2043D5;
            text-decoration: underline;
            color: white;
		}
        #create-pass-toggler, #reenter-pass-toggler {
            position: absolute;
            right: 100px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .label-container {
            text-align: left;
            margin-left: 75px;
        }
        .create-pass-label{
            margin: 20px;
            padding: 80px 0px;
            text-align: left;
            font-size: 20px;
        }
        .reenter-pass-label{
            margin: 20px;
            padding: 80px 0px;
            text-align: left;
            font-size: 20px;
        }
	</style>
    <script src="script/pwToggle.js"></script>
</html>
