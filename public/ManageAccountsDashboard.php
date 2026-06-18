<?php
include 'db-connect.php';
$sql = "
    SELECT 
        ui.First_Name,
        ui.Last_Name,
        ui.Institutional_Email,
        ui.Contact_No,
        ui.Username,
        ui.Campus,
        ui.Online_Date,
        uai.Total_Loaned,
        uai.Total_Fines,
        uai.Total_Restrictions
    FROM 
        user_info ui
    JOIN 
        user_accounts_info uai 
    ON 
        uai.Email = ui.Institutional_Email
    ";

$result = $conn->query($sql);

function getUserStatus($onlineDate)
{
    if (empty($onlineDate)) { // Check if the date is null or empty
        return "Inactive"; // Automatically mark as inactive
    }

    $currentDate = new DateTime(); // Current date
    $userOnlineDate = new DateTime($onlineDate); // Convert Online_Date to DateTime object
    $difference = $currentDate->diff($userOnlineDate); // Get the difference between the dates

    // Check if the difference exceeds one month
    if ($difference->m >= 1 || $difference->y > 0) { // If months >= 1 or years > 0
        return "Inactive";
    } else {
        return "Active";
    }
}

$account = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fullname = $row['First_Name'] . ' ' . $row['Last_Name'];
        $account[] = [
            'name' => $fullname,
            'email' => $row['Institutional_Email'],
            'contactNo' => $row['Contact_No'],
            'username' => $row['Username'],
            'campus' => $row['Campus'],
            'status' => getUserStatus($row['Online_Date']),
            'totalLoaned' => $row['Total_Loaned'],
            'totalFines' => $row['Total_Fines'],
            'totalRestrictions' => $row['Total_Restrictions']
        ];
    }
}

// Count the total users
$total_users_query = "SELECT COUNT(*) AS total_users FROM user_info";
$total_stmt = $conn->prepare($total_users_query);
$total_stmt->execute();
$total_result = $total_stmt->get_result();
$total_users = ($total_result && $row = $total_result->fetch_assoc()) ? $row["total_users"] : 0;

$check_query2 = "SELECT 
    (SELECT COUNT(*) FROM user_accounts_info WHERE Total_Loaned > 0) AS cnt_loan, 
    (SELECT COUNT(*) FROM user_accounts_info WHERE Total_Fines > 0) AS cnt_fines, 
    (SELECT COUNT(*) FROM user_accounts_info WHERE Total_Restrictions > 0) AS cnt_restrictions";

$stmt_check2 = $conn->prepare($check_query2);
$stmt_check2->execute();
$result2 = $stmt_check2->get_result();

// Check for valid query execution and fetch results
if ($result2 && $row = $result2->fetch_assoc()) {
    $loan = $row["cnt_loan"];
    $fines = $row["cnt_fines"];
    $restrictions = $row["cnt_restrictions"];
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
        /* UPPER BUTTONS */
        .cards-bdetails {
            flex: 1;
            flex-direction: row;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        .container-bdcardcon1 {
            width: 1100px;
            display: grid;
            grid-template-columns: auto auto auto auto;
            justify-content: space-around;
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

        .label-avbooks-container,
        .label-resbooks-container,
        .label-borbooks-container,
        .label-wobooks-container {
            text-align: center;
            margin: 16px 0px 0px 0px;
        }

        .label-avbookscount-container,
        .label-resbookscount-container,
        .label-borbookscount-container,
        .label-wobookscount-container {
            text-align: end;
            margin: 0px 32px 0px 0px;
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
            <h1>Account Dashboard</h1>
            <div class="filter-section">
                <button class="generate-btn" onclick="location.href='ManageAccounts-GenerateReport.php'">
                    Generate Report
                </button>
            </div>
        </div>

        <div class="cards-bdetails">
            <div class="container-bdcardcon1">
                <button class="avbooks-container" type="submit" name="totalstudents">
                    <div class="label-avbooks-container">
                        <span class="label-bdcardcon">Total Student Accounts</span>
                    </div>
                    <div class="label-avbookscount-container">
                        <span class="label-bdcardcon1"><?php echo $total_users ?></span>
                    </div>
                </button>

                <button class="borbooks-container" type="submit" name="userloanedbooks">
                    <div class="label-borbooks-container">
                        <span class="label-bdcardcon">Users with loaned Books</span>
                    </div>
                    <div class="label-borbookscount-container">
                        <span class="label-bdcardcon1"><?php echo $loan ?></span>
                    </div>
                </button>

                <button class="resbooks-container" type="submit" name="userfinebooks">
                    <div class="label-resbooks-container">
                        <span class="label-bdcardcon">Users with Fines</span>
                    </div>
                    <div class="label-resbookscount-container">
                        <span class="label-bdcardcon1"><?php echo $fines ?></span>
                    </div>
                </button>

                <button class="wobooks-container" type="submit" name="userrestrictionsbooks">
                    <div class="label-wobooks-container">
                        <span class="label-bdcardcon">Users with Restrictions</span>
                    </div>
                    <div class="label-wobookscount-container">
                        <span class="label-bdcardcon1"><?php echo $restrictions ?></span>
                    </div>
                </button>
            </div>
        </div>

        <div class="table-container">
            <table id="finesTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Campus</th>
                        <th>Status</th>
                        <th><i class="bi bi-journal-check"></i></th>
                        <th><i class="bi bi-credit-card"></i></th>
                        <th><i class="bi bi-person-exclamation"></i></th>
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
        let dummyFines = <?php echo json_encode($account); ?>;

        // Function to populate the table
        function populateTable() {
            const container = document.getElementById("fine-container");
            container.innerHTML = ''; // Clear existing rows

            dummyFines.forEach(fine => {
                const row = document.createElement("tr");
                row.className = "fine-row";

                row.innerHTML = `
                    <td>${fine.name}</td>
                    <td>${fine.email}</td>
                    <td>${fine.contactNo}</td>
                    <td>${fine.username}</td>
                    <td>${fine.campus}</td>
                    <td style="color: ${fine.status === 'Active' ? 'green' : 'red'};">${fine.status}</td>
                    <td style="color: ${fine.totalLoaned > 3 ? 'red' : 'inherit'};">${fine.totalLoaned}</td>
                    <td style="color: ${fine.totalFines > 3 ? 'red' : 'inherit'};">${fine.totalFines}</td>
                    <td style="color: ${fine.totalRestrictions >= 3 ? 'red' : 'inherit'};">${fine.totalRestrictions}</td>
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
                        title: 'Manage_Accounts_Report',
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
                        title: 'Manage_Accounts_Report'
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
                row.dataset.id = fine.email;

                row.innerHTML = `
                    <td>${fine.name}</td>
                    <td>${fine.email}</td>
                    <td>${fine.contactNo}</td>
                    <td>${fine.username}</td>
                    <td>${fine.campus}</td>
                    <td style="color: ${fine.status === 'Active' ? 'green' : 'red'};">${fine.status}</td>
                    <td style="color: ${fine.totalLoaned > 3 ? 'red' : 'inherit'};">${fine.totalLoaned}</td>
                    <td style="color: ${fine.totalFines > 3 ? 'red' : 'inherit'};">${fine.totalFines}</td>
                    <td style="color: ${fine.totalRestrictions >= 3 ? 'red' : 'inherit'};">${fine.totalRestrictions}</td>
                `;

                container.appendChild(row);
            });

            // Add click event to rows
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.addEventListener('click', function() {
                    const recordId = this.dataset.id;
                    window.location.href = `ManageAccounts-ViewUser.php?id=${recordId}`;
                });
            });
        }
    </script>
</body>

</html>