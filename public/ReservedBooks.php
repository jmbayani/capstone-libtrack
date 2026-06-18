<?php
include 'db-connect.php';

$sql = "
    SELECT 
        br.Reserve_ID,
        bi.Book_Title,
        bi.Author,
        br.Reserved_By,
        br.User_Email,
        ui.Contact_No,
        br.Reserved_Date,
        br.Status,
        br.Ready_Date,
        br.Total_Copies
    FROM 
        book_reservation br
    JOIN 
        book_info bi ON br.Accession_Number = bi.Accession_Number
    JOIN 
        user_info ui ON ui.Institutional_Email = br.User_Email;
    ";
$result = $conn->query($sql);

$fines = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row['Ready_Date'] == null){
            $row['Ready_Date'] = "----/--/--";
        }
        $fines[] = [
            'reserveID' => $row['Reserve_ID'],
            'bookTitle' => $row['Book_Title'],
            'author' => $row['Author'],
            'name' => $row['Reserved_By'],
            'email' => $row['User_Email'],
            'contactNo' => $row['Contact_No'],
            'reservedDate' => $row['Reserved_Date'],
            'status' => $row['Status'],
            'readyDate' => $row['Ready_Date'],
            'totalCopies' => $row['Total_Copies']
        ];
    }
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
            justify-content: space-between;
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
            margin-right: -20px;
        }

        .filter-select {
            width: 150px;
            padding: 9px;
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

        .generate-btn {
            background-color: var(--white);
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .generate-btn:hover {
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
            <h1>Reserved Books</h1>
            <div class="filter-section">
                <div class="search-group">
                    <select class="filter-select" id="status-filter">
                        <option value="">All Statuses</option>
                        <option value="Ready">Ready</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>

                <div class="date-group">
                    <label class="date-label">Start Date:</label>
                    <input type="date" id="start-date" class="date-input">

                    <label class="date-label">End Date:</label>
                    <input type="date" id="end-date" class="date-input">
                </div>

                <button class="generate-btn" onclick="location.href='ReservedBooks-GenerateReport.php'">
                    Generate Report
                </button>
            </div>
        </div>

        <div class="table-container">
            <table id="finesTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Reserved By</th>
                        <th>User Email</th>
                        <th>Contact No</th>
                        <th>Reserved Date</th>
                        <th>Status</th>
                        <th>Ready Date</th>
                        <th><i class="bi bi-file-earmark-text-fill"></th>
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
        let dummyFines = <?php echo json_encode($fines); ?>;

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
                    <td>${fine.name}</td>
                    <td>${fine.email}</td>
                    <td>${fine.contactNo}</td>
                    <td data-order="${new Date(fine.reservedDate).getTime()}">${fine.reservedDate}</td>
                    <td>${fine.status}</td>
                    <td data-order="${new Date(fine.readyDate).getTime()}">${fine.readyDate}</td>
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
                        title: 'Reserved Books Report',
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
                        title: 'Reserved_Books_Report'
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

            // Status filter functionality
            // Status filter functionality
            $('#status-filter').on('change', function() {
                const status = $(this).val();
                if (status === "") {
                    table.column(6).search("").draw(); // Clear filter if "All Statuses" is selected
                } else {
                    // Use exact match with case sensitivity
                    table.column(6).search("^" + status + "$", true, false).draw();
                }
            });
            // Date range filter functionality
            $('#start-date, #end-date').on('change', function() {
                const startDate = $('#start-date').val();
                const endDate = $('#end-date').val();

                // Custom filtering function for date range
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        const reservedDate = new Date(data[5]).getTime(); // Column index 3 is the date column
                        const start = startDate ? new Date(startDate).getTime() : null;
                        const end = endDate ? new Date(endDate).getTime() : null;

                        if ((start === null && end === null) ||
                            (start === null && reservedDate <= end) ||
                            (start <= reservedDate && end === null) ||
                            (start <= reservedDate && reservedDate <= end)) {
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
                row.dataset.id = fine.reserveID;

                row.innerHTML = `
                    <td>${fine.bookTitle}</td>
                    <td>${fine.author}</td>
                    <td>${fine.name}</td>
                    <td>${fine.email}</td>
                    <td>${fine.contactNo}</td>
                    <td data-order="${new Date(fine.reservedDate).getTime()}">${fine.reservedDate}</td>
                    <td>${fine.status}</td>
                    <td data-order="${new Date(fine.readyDate).getTime()}">${fine.readyDate}</td>
                    <td>${fine.totalCopies}</td>
            `;

                container.appendChild(row);
            });

            // Add click event to rows
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.addEventListener('click', function() {
                    const recordId = this.dataset.id;
                    window.location.href = `ReservedBooks-Ready.php?id=${recordId}`;
                });
            });
        }
    </script>
</body>

</html>