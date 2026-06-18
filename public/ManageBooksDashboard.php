<?php
include 'db-connect.php';

$sql = "
        SELECT 
            bi.Book_Title,
            bi.Author,
            bi.Shelf_Location,
            bi.Accession_Number,
            bi.Book_Status,
            bc.Total_Copies
        FROM 
            book_info bi
        JOIN 
            book_copies bc ON bc.Accession_Number = bi.Accession_Number;
        ";
$result = $conn->query($sql);

$books = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $books[] = [
            'bookTitle' => $row['Book_Title'],
            'author' => $row['Author'],
            'shelfLocation' => $row['Shelf_Location'],
            'accessionNumber' => $row['Accession_Number'],
            'bookStatus' => $row['Book_Status'],
            'totalCopies' => $row['Total_Copies']
        ];
    }
}

$check_query2 = "SELECT 
    (SELECT COUNT(*) FROM book_info) AS total_books, 
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Available') AS avail_books, 
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Borrowed') AS borrow_books,
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Reserved') AS reserve_books,
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'Weed Out') AS wout_books,
    (SELECT COUNT(*) FROM book_info WHERE Book_Status = 'For Repair') AS frepair_books";
                
$stmt_check2 = $conn->prepare($check_query2);
$stmt_check2->execute();
$result2 = $stmt_check2->get_result();

if ($result2 && $row = $result2->fetch_assoc()) {
    $total = $row["total_books"];
    $avail = $row["avail_books"];
    $borrow = $row["borrow_books"];
    $reserve = $row["reserve_books"];
    $wout = $row["wout_books"];
    $repair = $row["frepair_books"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>

    <title>LibTrack - Reserved Books</title>
    <style>
        :root {
            --primary-blue: #2043D5;
            --light-blue: #EFF5FF;
            --dark-blue: #0a269d;
            --white: #ffffff;
            --black: #333333;
            --gray: #dddddd;
            --green: #28a745;
            --red: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-blue);
            color: var(--black);
            line-height: 1.6;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cards-bdetails {
            flex: 1;
            flex-direction: row;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin: 10px 10px 20px 10px;
        }
            
        .container-bdcardcon1 {
            padding: 0;
            margin: 0;
            width: 540px;
            display: grid;
            grid-template-columns: auto auto;
            justify-content: space-around;
        }

        .totalbooks-container {
            height: 250px;
            width: 280px;
            border: 3px solid #2043D5;
            border-radius: 30px 30px;
        }

        .avbooks-container {
            height: 110px;
            width: 240px;
            border: 3px solid #2043D5;
            border-radius: 30px 30px;
            margin-bottom: 25px;
        }

        .borbooks-container {
            height: 110px;
            width: 240px;
            border: 3px solid #2043D5;
            border-radius: 30px 30px;
            margin-bottom: 25px;
        }

        .resbooks-container {
            height: 110px;
            width: 240px;
            border: 3px solid #2043D5;
            border-radius: 30px 30px;
        }

        .wobooks-container {
            height: 110px;
            width: 240px;
            border: 3px solid #2043D5;
            border-radius: 30px 30px;
        }

        .repbooks-container {
            height: 250px;
            width: 280px;
            border: 3px solid #2043D5;
            border-radius: 30px 30px;
        }

        .label-bdcardcon {
            font-family: poppins;
            font-size: 16px;
            font-weight: 400;
        }
        .label-bdcardcon1 {
            font-family: poppins;
            font-size: 40px;
            font-weight: 600;
        }

        .label-bdcardconb {
            font-family: poppins;
            font-size: 18px;
            font-weight: 400;
        }

        .label-bdcardconb1 {
            font-family: poppins;
            font-size: 80px;
            font-weight: 600;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .header {
            background-color: var(--primary-blue);
            color: var(--white);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .filter-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: start;
            margin-bottom: 20px;
        }

        .search-group {
            display: flex;
            flex: 1;
        }

        .search-input {
            flex: 1;
            padding: 10px 15px;
            border: 2px solid var(--primary-blue);
            border-radius: 5px 0 0 5px;
            font-size: 14px;
            width: 289px;
            margin-right: 10px;
        }

        .filter-select {
            width: 150px;
            padding: 10px;
            border: 2px solid var(--primary-blue);
            border-radius: 0 5px 5px 0;
            background-color: var(--white);
            font-size: 14px;
        }

        .date-group {
            margin-left: 100px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .date-label {
            font-weight: 500;
            color: var(--white);
        }

        .date-input {
            padding: 8px 12px;
            border: 2px solid var(--primary-blue);
            border-radius: 5px;
            background-color: var(--white);
        }

        .radio-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .radio-option input {
            width: 16px;
            height: 16px;
        }

        .radio-option label {
            color: var(--white);
            font-size: 14px;
        }

        .generate-btn, .accredit-btn, .addbook-btn {
            background-color: var(--white);
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .generate-btn:hover, .accredit-btn:hover, .addbook-btn:hover {
            background-color: var(--primary-blue);
            color: var(--white);
        }

        /* Table Styles */
        .table-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        #finesTable {
            width: 100%;
            border-collapse: collapse;
        }

        #finesTable thead th {
            background-color: var(--primary-blue);
            color: var(--white);
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
        }

        #finesTable tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--gray);
        }

        #finesTable tbody tr:last-child td {
            border-bottom: none;
        }

        #finesTable tbody tr:hover {
            background-color: rgba(32, 67, 213, 0.05);
            cursor: pointer;
        }

        .status-active {
            color: var(--green);
            font-weight: 500;
        }

        .status-inactive {
            color: var(--red);
            font-weight: 500;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px;
            margin: 0 2px;
            border-radius: 4px;
            border: 1px solid var(--gray);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--primary-blue);
            color: var(--white) !important;
            border: 1px solid var(--primary-blue);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: var(--primary-blue);
            color: var(--white) !important;
            border: 1px solid var(--primary-blue);
        }

        .dt-buttons {
            margin-bottom: 15px;
        }

        .dt-buttons button {
            background-color: var(--primary-blue);
            color: var(--white);
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        .dt-buttons button:hover {
            background-color: var(--dark-blue);
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
            }

            .search-group {
                width: 100%;
            }

            .date-group {
                flex-wrap: wrap;
            }

            #finesTable thead {
                display: none;
            }

            #finesTable tbody tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid var(--gray);
                border-radius: 5px;
            }

            #finesTable tbody td {
                display: block;
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            #finesTable tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                padding-right: 10px;
                font-weight: 600;
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="header">
            <h1>Book Dashboard</h1>
            <div class="filter-section">

                <button class="generate-btn" onclick="location.href='ManageBooks-GenerateReport.php'">
                    <i class="bi bi-file-earmark-plus"></i> Generate Report
                </button>
                <!--<button class="accredit-btn" onclick="location.href='ManageBooks-AccreditationReport.php'">
                    <i class="bi bi-file-earmark-plus"></i> Accreditation Report
                </button>-->
                <button class="addbook-btn" onclick="window.top.location.href='ManageBooks-AddBook-Scan.php'">
                    <i class="bi bi-file-earmark-plus"></i> Add Books
                </button>
            </div>
        </div>

        <div class="cards-bdetails">
            <div class="container-bdcardcon">
                <button class="totalbooks-container" type="submit" name="totalbooks">
                    <div class="label-totalbooks-container">
                        <span class="label-bdcardconb">Total Books</span>
                    </div>
                    <div class="label-totalbookscount-container">
                        <span class="label-bdcardconb1"><?php echo $total; ?></span>
                    </div>
                </button>
            </div>

            <div class="container-bdcardcon1">
                <button class="avbooks-container" type="submit" name="available">
                    <div class="label-avbooks-container">
                        <span class="label-bdcardcon" name="available">Available Books</span>
                    </div>
                    <div class="label-avbookscount-container">
                        <span class="label-bdcardcon1"><?php echo $avail; ?></span>
                    </div>
                </button>

                <button class="borbooks-container" type="submit" name="borrowed">
                    <div class="label-borbooks-container">
                        <span class="label-bdcardcon">Borrowed Books</span>
                    </div>
                    <div class="label-borbookscount-container">
                        <span class="label-bdcardcon1"><?php echo $borrow; ?></span>
                    </div>
                </button>

                <button class="resbooks-container" type="submit" name="reserved">
                    <div class="label-resbooks-container">
                        <span class="label-bdcardcon">Reserved Books</span>
                    </div>
                    <div class="label-resbookscount-container">
                        <span class="label-bdcardcon1"><?php echo $reserve; ?></span>
                    </div>
                </button>

                <button class="wobooks-container" type="submit" name="weed_out">
                    <div class="label-wobooks-container">
                        <span class="label-bdcardcon">Weed-Out Books</span>
                    </div>
                    <div class="label-wobookscount-container">
                        <span class="label-bdcardcon1"><?php echo $wout; ?></span>
                    </div>
                </button>
            </div>

            <div class="container-bdcardcon2">
                <button class="repbooks-container" type="submit" name="repair">
                    <div class="label-repbooks-container">
                        <span class="label-bdcardconb">For Repair Books</span>
                    </div>
                    <div class="label-repbookscount-container">
                        <span class="label-bdcardconb1"><?php echo $repair; ?></span>
                    </div>
                </button>
            </div>
        </div>

        <div class="table-container">
            <table id="finesTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Shelf Location</th>
                        <th>Accession Number</th>
                        <th>Status</th>
                        <th><i class="bi bi-file-earmark-text-fill"></i></th>
                    </tr>
                </thead>


                <tbody id="fine-container">
                    <!-- Data will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Dummy data array with the new structure
        let dummyFines = <?php echo json_encode($books); ?>;

        // Function to populate the table
        function populateTable() {
            const container = document.getElementById("fine-container");
            container.innerHTML = ''; // Clear existing rows

            dummyFines.forEach(fine => {
                const row = document.createElement("tr");
                row.className = "fine-row";

                row.innerHTML = `
                    <td>${fine.bookTitle}</td>
                    <td>${fine.author}</td>
                    <td>${fine.shelfLocation}</td>
                    <td>${fine.accessionNumber}</td>
                    <td>${fine.bookStatus}</td>
                    <td>${fine.totalCopies}</td>
                `;

                container.appendChild(row);
            });
        }

        // Call the function when the page loads
        document.addEventListener("DOMContentLoaded", () => {
            populateTable();

            // Initialize DataTable
            const table = $('#finesTable').DataTable({
                dom: 'Bfrtip', // Show buttons and other elements
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class="bi bi-printer"></i> Print',
                        className: 'print-btn',
                        exportOptions: {
                            columns: ':visible'
                        },
                        title: 'Manage_Books_Report',
                        customize: function (win) {
                            $(win.document.body).css('font-family', 'Poppins, sans-serif');
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', '12px');
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                        className: 'excel-btn',
                        exportOptions: {
                            columns: ':visible'
                        },
                        title: 'Manage_Books_Report'
                    }
                ],
                initComplete: function() {
                    // Create and move the search box
                    $('.dataTables_filter') // Get DataTables search box
                        .prependTo('.filter-section') // Move to your search group
                        .find('input') // Find the input element
                        .addClass('search-input') // Add your existing class
                        .attr('placeholder', 'Search...'); // Set placeholder

                    // Remove the default label
                    $('.dataTables_filter label').contents().filter(function() {
                        return this.nodeType === 3; // Remove text nodes
                    }).remove();
                }
            });
            // Date range filter functionality
            $('#start-date, #end-date').on('change', function() {
                const startDate = $('#start-date').val();
                const endDate = $('#end-date').val();

                // Custom filtering function for date range
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        const borrowDate = new Date(data[3]).getTime(); // Column index 3 is the date column
                        const start = startDate ? new Date(startDate).getTime() : null;
                        const end = endDate ? new Date(endDate).getTime() : null;

                        if ((start === null && end === null) ||
                            (start === null && borrowDate <= end) ||
                            (start <= borrowDate && end === null) ||
                            (start <= borrowDate && borrowDate <= end)) {
                            return true;
                        }
                        return false;
                    }
                );

                table.draw();
                $.fn.dataTable.ext.search.pop(); // Remove the filter function after applying
            });
        });

        // Modified populateTable function to make rows clickable
        function populateTable() {
            const container = document.getElementById("fine-container");
            container.innerHTML = ''; // Clear existing rows

            dummyFines.forEach((fine, index) => {
                const row = document.createElement("tr");
                row.className = "fine-row clickable-row";
                row.dataset.id = fine.accessionNumber // Assign a unique ID (in real app, use database ID)

                row.innerHTML = `
                    <td>${fine.bookTitle}</td>
                    <td>${fine.author}</td>
                    <td>${fine.shelfLocation}</td>
                    <td>${fine.accessionNumber}</td>
                    <td>${fine.bookStatus}</td>
                    <td>${fine.totalCopies}</td>
                `;

                container.appendChild(row);
            });

            // Add click event to rows
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.addEventListener('click', function() {
                    const recordId = this.dataset.id;
                    window.location.href = `ManageBooks-Details.php?id=${recordId}`;
                });
            });
        }
    </script>
</body>

</html>