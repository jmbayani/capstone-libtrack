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
        <div class="no-select book-bin-content">
            <h2 class="poppins-bold"> My Book Bin </h2>
            <div class="book-bin"> 
                <table class="header poppins-bold">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Book Title</th>
                            <th>Accession No.</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
                <table class="content poppins-regular">
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="book-check"></td>
                            <td> Anxious People </td>
                            <td> PCLIB-2024-503 </td>
                            <td> Available </td>
                            <td class="delete-btn"><i class="delete-icon fa-solid fa-trash-can" onclick="deleteRow(this)"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="footer">
                <input type="checkbox" id="select-all"><p class="select-button">Select All</p>
                <button class="poppins-bold clear-bin"> Clear Book Bin </button>
                <button class="poppins-bold check-out"> Check Out </button>
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
        .book-bin-content{
            display: table;
            flex-direction: column;
            width: 100%;
            padding: 10px;
        }
        .book-bin {
            height: 500px;
            overflow-y: auto;
            border: 3px solid #2043D5;
            margin: 0px 20px 0px 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .delete-icon {
            cursor: pointer;
        }
        h2 {
            text-indent: 24px;
        }
        .header {
            position: sticky;
            top: 0;
            table-layout: fixed;
            border-spacing: 1px;
            border-collapse: collapse;
            width: 100%;
        }
        .content {
            table-layout: fixed;
            border-spacing: 1px;
            border-collapse: collapse;
            width: 100%;
        }
        .footer {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: left;
            border: 3px solid #2043D5;
            border-top-style: none;
            border-collapse: collapse;
            width: 95.2%;
            margin-left: 20px;
            margin-right: 20px;
            padding: 8px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }
        .select-button {
            text-indent: 10px;
        }
        .clear-bin, .check-out {
            position: static;
            margin: 2px 20px 2px 20px;
            padding: 2px 20px;
			font-size: 16px;
			color: black;
            border: 3px solid #2043D5;
			border-radius: 50px;
			text-decoration: none;
			cursor: pointer;
			transition: all 0.2s ease;
        }
        .clear-bin:hover, .check-out:hover {
            background-color: #2043D5;
            color: #fff;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #2043D5;
        }
        th {
            background-color: #2043D5;
            color: white;
            text-align: center;
            padding: 8px;
        }
        th:first-child, td:first-child {
            text-align: left;
            width: 1%;
            border-top-left-radius: 8px;
        }
        th:nth-child(2), td:nth-child(2) {
            text-align: left;
            width: 20%;
        }
        th:nth-child(3), td:nth-child(3) {
            text-align: center;
            width: 15%;
        }
        th:nth-child(4), td:nth-child(4) {
            text-align: center;
            width: 5%;
        }
        th:last-child, td:last-child {
            text-align: center;
            width: 1%;
            border-top-right-radius: 8px;
        }
        tr:nth-child(even) {
            background-color: #E7EBFE;
        }
		::-webkit-scrollbar {
			display: none;
		}
	</style>
    <script src="script/reservedBooks.js"  defer></script>
</html>