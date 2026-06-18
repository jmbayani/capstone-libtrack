<?php
session_start(); // Start session to store last scanned UID
include 'db-connect.php';

$resultDisplay = null; // To hold the result if a book is found
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $scndbookcode = $_POST['scndbookcode'];

    // Check if the same book was already scanned in this session
    if (isset($_SESSION['last_scanned_uid']) && $_SESSION['last_scanned_uid'] == $scndbookcode) {
		unset($_SESSION['last_scanned_uid']);
        echo "<script>
            alert('Book entry duplicated, try again.');
			window.location.href = 'BorrowBookPage.php';
        </script>";
        exit;
    } else {
		$_SESSION['last_scanned_uid'] = $scndbookcode;
	}

    // Query to display book info from rfid_books_ii
    $stmtDisplay = $conn->prepare("
        SELECT rfid_books_ii.UID,
               rfid_books_ii.Accession_Number,
               book_info.Book_Title,
               book_info.Author
        FROM rfid_books_ii
        JOIN book_info ON rfid_books_ii.Accession_Number = book_info.Accession_Number
        WHERE rfid_books_ii.UID = ?
    ");
    $stmtDisplay->bind_param("s", $scndbookcode);
    $stmtDisplay->execute();
    $resultDisplay = $stmtDisplay->get_result();

}

$currentDate = date('M d, Y');
$currentTime = date('h:i:s A');

$stmtTables = $conn->prepare("
							  SELECT book_circulation.Borrowed_Date, book_circulation.Borrowed_Time, 
							  		 book_circulation.Username, book_info.Book_Title 
							  FROM 
							  		 book_circulation
							  JOIN book_info ON book_circulation.Accession_Number = book_info.Accession_Number");
$stmtTables->execute();
$resultTables = $stmtTables->get_result();
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
	<body class='no-select poppins-regular'>
		<div class="borrow-book-layout-1">
			<div class="borrow-book-input">
				<h1 class="lilita-one-regular">Borrow a Book</h1>
				<form method="POST">
					<input id="scndbookcode" name="scndbookcode" class="poppins-regular scan-text" type="text" placeholder="Scan your Book">
					<button type="submit" id="scanBtn" class="poppins-bold scan-button" >Scan Book</button>
				</form>
				<p class="rfid-description">Please scan the RFID tag to proceed with borrowing the book. After scanning, gently place the book in the book drop.</p>

			</div>
			<div class="borrow-book-list">
				<div class ="header">
					<h2 class="lilita-one-regular header-title">Check-out</h2>
					<p id="date-time" name="date" value="date-time">
				</div>
				<?php if ($resultDisplay && $resultDisplay->num_rows > 0): ?>
					<?php while($row = $resultDisplay->fetch_assoc()): ?>
						<div class="body">
							<form method="POST" action="borrow-book.php">
							<hr class="hrstyle">
							<input class="poppins-regular text1" name="booktitle" value="<?php echo htmlspecialchars($row['Book_Title']); ?>" style="border: none;" readonly>
							<input class="poppins-regular text2" name="author" value="<?php echo htmlspecialchars($row['Author']); ?>" style="border: none;">
							<input class="poppins-regular text2" name="acnumber" value="<?php echo htmlspecialchars($row['Accession_Number']); ?>" style="border: none;" readonly>
							<hr class="hrstyle">
							<div class="text3">
								<label for="stdNumber" >Student ID: </label>
								<input class="poppins-regular text4" name="stdnumber" placeholder="Enter Student ID" required>	
								<button type="submit" id="BorrowBtn" class="borrow-button poppins-regular" >Borrow Book</button>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="borrow-book-layout-2">
			<div class="borrow-book-data">
				<?php if ($resultTables && $resultTables->num_rows > 0): ?>
					<?php while($row = $resultTables->fetch_assoc()): ?>
					<table class="data-table">
						<tr>
							<td class="table-cell"><?php echo htmlspecialchars(date("F j, Y", strtotime($row['Borrowed_Date']))); ?></td>
							<td class="table-cell"><?php echo htmlspecialchars($row['Borrowed_Time']); ?></td>
							<td class="table-cell"><?php echo htmlspecialchars($row['Username'].' borrowed '.$row['Book_Title']); ?></td>
						</tr>
					</table>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<script src="script/realDateTime.js">
		</script>
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
		.borrow-book-layout-1{
			display: flex;
			flex-direction: row;
			width: 100%;
		}
		.borrow-book-layout-2{
			display: flex;
			flex-direction: column;
			width: 90%;
			height: 50%;
		}
		.borrow-book-input {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
            border-radius: 100px;
            width: 50%;
            height: auto;
            margin: 20px;
		}
		.borrow-book-list {
			align-items: center;
            border-radius: 50px;
            width: 50%;
            height: auto;
            margin: 20px;
			border: 10px solid #2038AD;
            background-color: #fff;
		}
		
		.borrow-book-data {
            border-radius: 20px;
            width: 100%;
            height: 220px;
            margin-top: 20px;
			border: 10px solid #2038AD;
            background-color: black;
			color: #fff;
		}
		.header {
			display: flex;
			flex-direction: row;
			justify-content: space-evenly;
			align-items: center;
		}
		.header-title {
			margin-left: 100px;
			margin-right: 100px;
		}
		.date-time {
			margin-left: 50px;
			margin-right: 50px;
		}
		.rfid-description {
			text-align: center;
			color: #FF0202;
		}
		table.data-table {
			table-layout: fixed;
            border-spacing: 1px;
            border-collapse: collapse;
            width: 100%;
		}
        .table-cell {
            text-align: left;
			font-size: 12px;
            padding: 10px;
        }
		.footer {
			display: flex;
			flex-direction: row;
			justify-content: space-evenly;
			align-items: center;
		}
		.footer-description {
			margin-left: 100px;
			margin-right: 20px;
		}
		.borrow-button {
		  display: inline-block;
		  padding: 2px 50px;
		  font-size: 16px;
		  color: black;
		  background-color: #EFF5FF;
		  border: 3px solid #2043D5;
		  border-radius: 50px;
		  text-decoration: none;
		  cursor: pointer;
		  margin-left: 65px;
		  transition: background 0.2s;
		}
		.borrow-button:hover {
            background-color: #2038AD;
			color: #fff
        }
		.scan-text {
			width: 100px;
            background-color: #fff;
            border: 3px solid #2043D5;
            padding: 10px;
            margin: 60px 0;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.2s;
		}
		button.scan-button {
			width: 40%;
            background-color: #fff;
			color: #2043D5;
            border: 3px solid #2043D5;
            padding: 10px;
            margin-top: 60px;
			margin-left: 88px;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.2s;
		}
		button.scan-button:hover {
            background-color: #2038AD;
			color: #fff
        }
		.hrstyle {
			width: 538px;
			margin: 5px 25px;
			height: 1.5px;
			border-width: 0;
			color: #2043D5;
			background-color: #2043D5;
		}
		.text1 {
			margin: 0;
			margin-left: 70px;
		}
		.text2 {
			margin: 0;
		}
		.text3 {
			color: #2043D5;
			font-weight: bold;
			font-size: x-small;
			margin-top: 140px;
			margin-left: 30px;
		}
		.text4 {
			margin-left: 30px;
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
		.scan-text {
			border: 3px solid #2043D5;
			border-radius: 30px;
			padding: 8px 8px 8px 8px;
			margin: 5px 10px;
			width: 75%;
			text-align: center;
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
		let lastUID = ""; // Store the last UID fetched

		function fetchUID() {
			fetch('scan_rfid.php')
				.then(response => response.text())
				.then(rfid => {
					rfid = rfid.trim();

					// Only act if there's a new UID and the input is still empty
					if (rfid && rfid !== lastUID) {
						const uidField = document.getElementById('scndbookcode');
						if (uidField && uidField.value.trim() === "") {
							uidField.value = rfid;
							lastUID = rfid;

							// Clear UID from file immediately after use
							fetch('clear_uid.php');
						}
					}
				})
				.catch(error => console.error("Fetch error:", error));
		}

		// Poll every 1 second
		setInterval(fetchUID, 1000);


			// Start fetching immediately and every 2 seconds
			window.addEventListener("DOMContentLoaded", () => {
				fetchUID();
				setInterval(fetchUID, 1000);
			});
	</script>
</html>
