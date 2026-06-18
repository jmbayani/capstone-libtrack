<?php
session_start();
include 'db-connect.php';

// Default to "info" if not set
if (!isset($_SESSION['patron_type'])) {
    $_SESSION['patron_type'] = "info";
}

// Switch to "display" state and initialize the timer when triggered
if ($_SESSION['patron_type'] === "info" && isset($_POST['trigger_display'])) {
    $_SESSION['patron_type'] = "display";
    $_SESSION['display_start_time'] = time(); // Initialize timer
}

// Check if "display_start_time" is set before using it
if ($_SESSION['patron_type'] === "display") {
    if (!isset($_SESSION['display_start_time'])) {
        $_SESSION['display_start_time'] = time(); // Defensive assignment
    }

    // Check if 10 seconds have passed
    if ((time() - $_SESSION['display_start_time']) >= 10) {
        // Reset back to "info" and clean up session data
        $_SESSION['patron_type'] = "info";
        unset($_SESSION['display_start_time']);
        unset($_SESSION['patron_id']);
        unset($_SESSION['Full_Name']);
        unset($_SESSION['visits']);
    }
}

// Query the database for the number of visitors
$check_query = "SELECT COUNT(*) AS count FROM patron_attendance";
$stmt_check = $conn->prepare($check_query);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $visit = $row["count"];
} 
?>


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
	<body class='poppins-regular'>
		<div class="no-select container">
            <div class="container-header">
                <h1> Patron Attendance</h1>
            </div>

<?php if($_SESSION['patron_type'] === "info"): ?>
    <form action="backend_script/patron_attendance_properties.php" method="POST">
    <div class="patron-content">
        <div class="poppins-bold  patron-label"> 
            <p> Department: </p> <br>
            <p> Patron ID: </p> <br>
            <p> Full Name: </p> <br>
            <p> Current Date (Time): </p> <br>
            <p> No of Visitors: </p> <br>
        </div>
        <div class="poppins-regular patron-display"> 
            <p> Pasig Library </p> <br>
            <p style="display: flex; align-items: center; gap: 10px;"> 
                <input class="poppins-regular patron-text" type="text" placeholder="Enter your student number" name="patron_id" required>
                <button class="search-button" name="Done">Search</button>
            </p><br>
            <p> </p><br><br>
            <p id="date-time" name="date" value="date-time"></p> <br>
            <p><?php echo $visit ?></p>
        </div>
    </div>
    </form>

    <style>
    .search-button {
        padding: 8px 20px;
        background-color: #2043D5;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .search-button:hover {
        background-color: #162ea8;
    }

    .patron-text {
        padding: 8px;
        border-radius: 5px;
    }
    
    </style>


<?php elseif($_SESSION['patron_type'] === "display"): ?>
    <form action="backend_script/patron_attendance_properties.php" method="POST">
    <div class="patron-content">
        <div class="poppins-bold  patron-label"> 
            <p> Department: </p> <br>
            <p> Patron ID: </p> <br>
            <p> Full Name: </p> <br>
            <p> Current Date (Time): </p> <br>
            <p> No of Visitors: </p> <br>
        </div>
        <div class="poppins-regular patron-display"> 
            <p> Pasig Library </p> <br>
            <p><?php echo $_SESSION['patron_id'] ?></p><br>
            <p><?php echo $_SESSION['Full_Name'] ?></p> <br>
            <p id="date-time"></p>  <br>
            <p><?php echo $visit ?></p> <br>
        </div>
    </div>
    <button class="cl-btn" name="back">
        &#x2715; Close
    </button>
    </form>
    
<?php endif; ?>
		</div>
	</body>
	<style>
        .cl-btn{
        background-color:#ff4d4d; 
        color: white; 
        padding: 8px 20px; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer; 
        font-family: 'Poppins', sans-serif; 
        font-size: 16px;
    }
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
		.container {
			align-items: center;
            width: 70%;
            border: 10px solid #2043D5;
			border-radius: 30px;
            margin: 50px;
            height: 83vh;
		}
        .container-header{
            background-color: #2043D5;
            color: #fff;
            width: 100%;
            border-radius: 10px 10px 0px 0px;
            text-indent: 20px;
        }
        h1 {
            margin: 0;
        }
        .patron-content{
            display: flex;
        }
        .patron-label{
            display: table;
            flex-direction: column;
            font-size: 20px;
            text-align: left;
            width: 400px;
            padding: 10px;
        }
        .patron-display {
            display: table;
            flex-direction: column;
            text-align: left;
            font-size: 20px;
            width: 700px;
            padding: 10px;
        }
        .patron-display p{
            margin: 10px;
        }
        .patron-label p{
            margin: 10px;
        }
        .patron-text {
			border: 3px solid black;
            font-size: 18px;
			width: 35%;
			cursor: pointer;
		}
		::-webkit-scrollbar {
			display: none;
		}
	</style>
    <script src="script/patronDateTime.js"  defer></script>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const dateTimeElement = document.getElementById("date-time");

        const updateDateTime = () => {
            const now = new Date();
            const formattedDateTime = now.toLocaleDateString("en-US", {
                year: "numeric",
                month: "long",
                day: "numeric",
            }) + " - " + now.toLocaleTimeString("en-US", {
                hour12: false, // Ensures 24-hour format
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            });
            dateTimeElement.textContent = formattedDateTime;
        };

        updateDateTime(); // Initial call
        setInterval(updateDateTime, 1000); // Update every second
    });

    document.addEventListener("DOMContentLoaded", () => {
        const sessionType = "<?php echo $_SESSION['patron_type']; ?>";

        if (sessionType === "display") {
            setTimeout(() => {
                window.location.reload(); // Refresh the page to update the session state
            }, 10000); // 10 seconds
        }
    });
    </script>
</html>