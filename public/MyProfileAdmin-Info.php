<?php
include 'db-connect.php';
session_start();
    
    $insti_email = $_SESSION['institutional_email'];

    // Fetch book details from the database
    $sql = "SELECT * FROM user_info WHERE Institutional_Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $insti_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();


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
        <div class="no-select profile-content">
            <div class="poppins-bold profile-info"> 
                <table>
                    <tr>
                        <td> Name </td>
                        <td> <?php echo $_SESSION['name']; ?></td>
                    </tr>
                    <tr>
                        <td> Username </td>
                        <td> <?= htmlspecialchars($user['Username'])?>  </td>
                    </tr>
                    <tr>
                        <td> Institutional Email </td>
                        <td> <?php echo $_SESSION['institutional_email']; ?>  </td>
                    </tr>
                    <tr>
                        <td> Role </td>
                        <td> <?= htmlspecialchars($user['User_Role'])?> </td>
                    </tr>
                    <tr>
                        <td> Contact </td>
                        <td> <?= htmlspecialchars($user['Contact_No'])?> </td>
                    </tr>
                </table>
            </div>
            <div class="profile-buttons"> 
                <i class="profile-default fa-solid fa-book-open-reader"></i>
                <button class="poppins-bold password-edit">Add New Librarian Admin</button>
                <button class="poppins-bold password-edit">Change Password</button>
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
        .profile-content{
            display: flex;
        }
        .profile-info{
            display: table;
            flex-direction: column;
            font-size: 16px;
            width: 770px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #E7EBFE;
        }
        .profile-buttons {
            display: flex;
			flex-direction: column;
			align-items: center;
            width: 340px;
		}
        .profile-default {
            font-size: 140px;
            margin: 20px;
        }
        .profile-edit, .password-edit{
            border: 3px solid #2043D5;
            text-align: center;
            border-radius: 30px;
            padding: 10px;
            margin: 5px 10px;
            width: 60%;
            cursor: pointer;
        }
        .profile-edit:hover, .password-edit:hover {
            background-color: #2043D5;
            color: #fff;
            transition: all 0.2s ease;
        }
        .request-account-delete {
            border: 3px solid #FF4444;
            text-align: center;
            border-radius: 30px;
            padding: 10px;
            margin: 5px 10px;
            width: 60%;
            cursor: pointer;
        }
        .request-account-delete:hover {
            background-color: #FF0202;
            color: #fff;
            transition: all 0.2s ease;
        }
		::-webkit-scrollbar {
			display: none;
		}
	</style>
    <script src="script/patronDateTime.js"  defer></script>
</html>