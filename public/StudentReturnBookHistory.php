<?php
include 'db-connect.php';

session_start();
$username = $_SESSION['username'];

$sqlReturnHistory = "
    SELECT
        bi.Book_Title,
        bi.Author,
        bi.ISBN,
        bi.Accession_Number,
        bi.Genre,
        bi.Publisher,
        bi.Publication_Date,
        bc.Returned_Date,
        bc.Returned_Time
    FROM
        book_circulation bc 
    JOIN
        book_info bi ON bi.Accession_Number = bc.Accession_Number
    WHERE
        Username = ?
    ";
    $stmtReturnHistory = $conn->prepare($sqlReturnHistory);
    $stmtReturnHistory->bind_param("s", $username);
    $stmtReturnHistory->execute();
    $resultReturned = $stmtReturnHistory->get_result();

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
		<div class="no-select container">
        <div class="container-bdcardcon1">
            <div>
                <h1 class="label-managefines">Returned Book History</h1>
            </div>
        <div class="container-sddb">
            <div class="container-searchbarfilter">
                <input class="input-searchbar" type="text" id="search" placeholder="Search">
            </div>

            <div class="container-startenddate">
                <label class="label-startdate">Start Date</label>
                <input class="date-startdate" type="date" id="start-date">
                <label class="label-enddate">End Date</label>
                <input class="date-enddate" type="date" id="end-date">
            </div>
        </div>

        </div>
            <div class="container">
                <div class="borrow-books-container">
                    <!-- First Fine Record -->
                    <?php if($resultReturned ->num_rows > 0):?>
                        <?php while ($row = $resultReturned->fetch_assoc()): ?>
                        <div class="fine-record">
                            <table class="fines-table" id="data-table">
                                <tr class="fine-entry">
                                    <td><b>Book Title:</b></td>
                                    <td><b>Genre:</b></td>
                                    <td><b>Returned Date:</b></td>
                                    <td><b>Time:</b></td>
                                </tr>
                                <tr class="fine-entry">
                                    <td><?= htmlspecialchars($row['Book_Title'])?></td>
                                    <td><?= htmlspecialchars($row['Genre'])?></td>
                                    <td><?= htmlspecialchars($row['Returned_Date'])?></td>
                                    <td><?= htmlspecialchars($row['Returned_Time'])?></td>
                                </tr>
                                <tr class="fine-entry">
                                    <td><b>Author:</b></td>
                                    <td><b>Publisher:</b></td>
                                </tr>
                                <tr class="fine-entry">
                                    <td><?= htmlspecialchars($row['Author'])?></td>
                                    <td><?= htmlspecialchars($row['Publisher'])?></td>
                                </tr>
                                <tr class="fine-entry">
                                    <td><b>ISBN:</b></td>
                                    <td><b>Publication Date:</b></td>
                                </tr>
                                <tr class="fine-entry">
                                <td><?= htmlspecialchars($row['ISBN'])?></td>
                                <td><?= htmlspecialchars($row['Publication_Date'])?></td>
                                </tr>
                                <tr class="fine-entry">
                                    <td><b>Accession No.:</b></td>
                                </tr>
                                <tr class="fine-entry">
                                    <td><?= htmlspecialchars($row['Accession_Number'])?></td>
                                </tr>
                            </table>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
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
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
            height: 600px;
            width: 90%;
			border-radius: 30px;
            margin: 30px;
		}
        .container-bdcardcon1 {
            height: 270px;
            width: 1144px;
            display: grid;
            grid-template-columns: auto auto;
            justify-content: space-around;
            background-color: #2043D5;
            color: #fff;
            border-radius: 25px;
            align-items: center;
        }
        .container-searchbarfilter {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 20px;
        }

        .container-startenddate {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 20px;
            justify-content: flex-end;
        }

        .label-managefines {
            font-size: 40px;
            font-family: poppins;
            font-weight: 600;
            color: white;
        }

        .label-startdate {
            font-size: 18px;
            font-family: poppins;
            font-weight: 400;
            color: white;
        }

        .label-enddate {
            font-size: 18px;
            font-family: poppins;
            font-weight: 400;
            color: white;
        }

        .input-searchbar {
            width: 390px;
            padding: 10px;
            border-radius: 30px;
            border: 2px solid #0a269d;
            font-size: 16px;
            flex-grow: 1;
        }

        .date-startdate, .date-enddate {
            padding: 10px;
            border-radius: 30px;
            border: 2px solid #0a269d;
            font-size: 16px;
            cursor: pointer;
        }

        .fines-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 20px;
        }

        .fine-record {
            border: 3px solid #2043D5;
            width: 1140px;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .fines-table {
            width: 100%;
            border-collapse: collapse;
        }

        .fines-table td {
            padding: 12px;
            vertical-align: top;
            border: none;
        }
		::-webkit-scrollbar {
			display: none;
		}
</style>
<script>
    // Search Functionality
    const searchInput = document.getElementById('search');
    const table = document.getElementById('dataTable');
    const rows = table.getElementsByTagName('tr');

    searchInput.addEventListener('input', function () {
        const filter = searchInput.value.toLowerCase();

        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        }
    });

    // Date Filter Functionality
    const startInput = document.getElementById("start-date");
    const endInput = document.getElementById("end-date");

    function filterTable() {
      const start = new Date(startInput.value);
      const end = new Date(endInput.value);

      for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const dateText = row.cells[2].textContent;
        const rowDate = new Date(dateText);

        // Filter rows based on both text search and date range
        const isTextVisible = row.style.display !== 'none';
        const isDateVisible = (!isNaN(start) && !isNaN(end)) 
          ? rowDate >= start && rowDate <= end 
          : true;

        if (isTextVisible && isDateVisible) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      }
    }

    startInput.addEventListener("input", filterTable);
    endInput.addEventListener("input", filterTable);
</script>
</html>