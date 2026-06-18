<?php
include 'db-connect.php';

session_start();
$username = $_SESSION['username'];

$sqlFines = "
    SELECT
        bi.Book_Title,
        fp.Accession_Number,
        fp.Penalty_Reason,
        fp.Penalty_Issued_Date,
        fp.Settle_Date,
        fp.Amount,
        fp.Status
    FROM
        fines_penalties fp
    JOIN
        book_info bi ON bi.Accession_Number = fp.Accession_Number
    WHERE
        Penalty_To = ?;
    ";
    $stmtFines = $conn->prepare($sqlFines);
    $stmtFines->bind_param("s", $username);
    $stmtFines->execute();
    $resultFines = $stmtFines->get_result();

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
            <div class="profile-fines-info"> 
                <table class="poppins-bold">
                    <tr>
                        <th>Book Title</th>
                        <th>Accession No.</th>
                        <th>Reason</th>
                        <th>Penalty Issue Date</th>
                        <th>Settle Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </table>
                <?php if($resultFines ->num_rows > 0):?>
                    <?php while ($row = $resultFines->fetch_assoc()): ?>
                    <table  class="poppins-regular">
                        <tr>
                            <td> <?= htmlspecialchars($row['Book_Title'])?> </td>
                            <td> <?= htmlspecialchars($row['Accession_Number'])?> </td>
                            <td> <?= htmlspecialchars($row['Penalty_Reason'])?> </td>
                            <td> <?= htmlspecialchars($row['Penalty_Issued_Date'])?> </td>
                            <td> <?= htmlspecialchars($row['Settle_Date'])?> </td>
                            <td> <?= htmlspecialchars(number_format($row['Amount'], 2))?> </td>
                            <td> <?= htmlspecialchars($row['Status'])?> </td>
                        </tr>
                    </table>
                    <?php endwhile; ?>
                <?php endif; ?>
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
            display: table;
            flex-direction: column;
            font-size: 16px;
            width: 100%;
            padding: 10px;
        }
        table {
            table-layout: fixed;
            border-spacing: 1px;
            border-collapse: collapse;
            width: 100%;
        }
        td {
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #2043D5;
            color: white;
            text-align: center;
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 8px;
        }
        th:first-child, td:first-child {
            text-align: left;
            border-right-style: hidden;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        th:last-child {
            border-left-style: hidden;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        th:nth-child(3), td:nth-child(4), td:nth-child(5) {
            border-left-style: hidden;
            border-right-style: hidden;

        }
        tr:nth-child(even) {
            background-color: #E7EBFE;
        }
		::-webkit-scrollbar {
			display: none;
		}
	</style>
    <script src="script/patronDateTime.js"  defer></script>
</html>