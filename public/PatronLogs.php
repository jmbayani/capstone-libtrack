<?php
include "db-connect.php";

$sql = "
    SELECT 
        Patron_ID,
        Full_Name,
        Current_Date_Time
    FROM 
        patron_attendance
    ";
$result = $conn->query($sql);

$patron = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $patron[] = [
            'patronID' => $row['Patron_ID'],
            'fullName' => $row['Full_Name'],
            'currentDateTime' => $row['Current_Date_Time']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
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

        ::-webkit-scrollbar {
            display: none;
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
<body class="bg-[#EFF5FF] p-4">
    <div class="main-container">
        <div class="header">
            <h1>Patron Logs</h1>
            <div class="filter-section">
                <div class="date-group">
                    <label class="date-label">Start Date:</label>
                    <input type="date" id="start-date" class="date-input">

                    <label class="date-label">End Date:</label>
                    <input type="date" id="end-date" class="date-input">
                </div>

                <button class="generate-btn" onclick="location.href='BookCirculation-GenerateReport.php'">
                    Generate Report
                </button>
                <button class="generate-btn" onclick="location.href='PatronAttendance.php'">
                    Patron Attendance
                </button>
            </div>
        </div>

        <div class="table-container">
            <table id="finesTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Patron ID</th>
                        <th>Full Name</th>
                        <th>Current Date Time</th>
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
        let dummyFines = <?php echo json_encode($patron); ?>;

        // Function to populate the table
        function populateTable() {
            const container = document.getElementById("fine-container");
            container.innerHTML = ''; // Clear existing rows

            dummyFines.forEach(fine => {
                const row = document.createElement("tr");
                row.className = "fine-row";

                row.innerHTML = `
                    <td>${fine.patronID}</td>
                    <td>${fine.fullName}</td>
                    <td>${fine.currentDateTime}</td>
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
                        title: 'Patron_Attendance_Report',
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
                        title: 'Patron_Attendance_Report'
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
                        const borrowDate = new Date(data[2]).getTime(); // Column index 3 is the date column
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
                row.dataset.id = index + 1; // Assign a unique ID (in real app, use database ID)

                row.innerHTML = `
                    <td>${fine.patronID}</td>
                    <td>${fine.fullName}</td>
                    <td>${fine.currentDateTime}</td>
                `;

                container.appendChild(row);
            });
        }
    </script>
</body>
</html>