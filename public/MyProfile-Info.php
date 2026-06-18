<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
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
		<title>My Profile</title>
	</head>
	<body class='poppins-regular'>
        <div class="no-select profile-content">
            <div class="poppins-bold profile-info"> 
                <table>
                    <tr>
                        <td> Name </td>
                        <td id="user-name"> Loading... </td>
                    </tr>
                    <tr>
                        <td> Username </td>
                        <td id="user-username"> Loading... </td>
                    </tr>
                    <tr>
                        <td> Institutional Email </td>
                        <td id="user-email"> Loading... </td>
                    </tr>
                    <tr>
                        <td> Department </td>
                        <td id="user-department"> Loading... </td>
                    </tr>
                    <tr>
                        <td> Course </td>
                        <td id="user-course"> Loading... </td>
                    </tr>
                    <tr>
                        <td> Campus </td>
                        <td id="user-campus"> Loading... </td>
                    </tr>
                    <tr>
                        <td> Contact </td>
                        <td id="user-contact"> Loading... </td>
                    </tr>
                </table>
            </div>
            <div class="profile-buttons"> 
                <i class="profile-default fa-solid fa-book-open-reader"></i>
                <button class="poppins-bold profile-edit"> Edit Profile </button>
                <button class="poppins-bold password-edit">Change Password</button>
                <br>
                <button class="poppins-bold request-account-delete">Request Account Deletion</button>
            </div>    
        </div>
	</body>
	<style>
		body {
            background-color: #f4f4f4;
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
            width: 70%;
            padding: 10px;
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
            width: 450px;
            padding: 10px;
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
        #user-name{
            color: black;
        }
	</style>
   <script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('get_user_data.php', {
            credentials: 'include'  // 🔥 Critical: Ensures cookies (like PHPSESSID) are sent
        })
        .then(response => {
            if (!response.ok) {  // Check for HTTP errors (e.g., 500, 404)
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                alert(data.error);  // Show the exact error from PHP
                window.location.href = "LoginLibTrack.php";  // 🔥 Match your login page filename
                return;
            }

            // Populate user data (adjust field names to match your PHP response)
            document.getElementById('user-name').textContent = data.First_Name + ' ' + data.Last_Name || 'Not set';
            document.getElementById('user-username').textContent = data.Username || 'Not set';
            document.getElementById('user-email').textContent = data.Institutional_Email || 'Not set';
            document.getElementById('user-department').textContent = data.Department || 'Not set';
            document.getElementById('user-course').textContent = data.Course || 'Not set';
            document.getElementById('user-campus').textContent = data.Campus || 'Not set';
            document.getElementById('user-contact').textContent = data.Contact_No || 'Not set';
        })
        .catch(error => {
            console.error("Fetch error:", error);
            alert("Session expired or server error. Redirecting to login...");
            window.location.href = "LoginLibTrack.php";  // 🔥 Match your login page
        });
    });
</script>
</html>