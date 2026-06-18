<?php
include 'db-connect.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $fromDate = $_POST['startDate'];
    $toDate = $_POST['endDate'];
    $format = $_POST['format'];
    $export = $_POST['export'];

    $dateNow = date("Y-m-d-");

    // Query building
    $query = "    
        SELECT 
            bi.Book_Title,
            bi.Author,
            br.Reserved_By,
            br.User_Email,
            ui.Contact_No,
            br.Reserved_Date,
            br.Status,
            br.Ready_Date,
            br.Pick_up_Location,
            br.Total_Copies,
            br.Reserve_Timestamp
        FROM 
            book_reservation br
        JOIN 
            book_info bi ON br.Accession_Number = bi.Accession_Number
        JOIN 
            user_info ui ON ui.Institutional_Email = br.User_Email
        WHERE
            Reserved_Date BETWEEN '$fromDate' AND '$toDate'
    ";
    if ($category == "Ready" ) {
        $query .= " AND Status = 'Ready'";
    } else {
        $query .= " AND Status = 'Pending'";
    }

    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);

    if ($export === "PDF") {
        require_once('tcpdf/tcpdf.php'); // Make sure you have TCPDF installed

        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('times', '', 9);

        $html = "<h2 style='text-align: center;'>Reservation Books - $format</h2>";
        $html .= "<table border='1' cellpadding='4' cellspacing='0' style='width: 100%; text-align: center;'><thead><tr>";

        $html .= "<th><b>Book Title</b></th>
                  <th><b>Author</b></th>
                  <th><b>Reserved By</b></th>
                  <th><b>Email</b></th>
                  <th><b>Contact No.</b></th>
                  <th><b>Reserve Date</b></th>
                  <th><b>Status</b></th>
                  <th><b>Ready Date</b></th>
                  <th><b>Pickup Location</b></th>
                  <th><b>All Copies</b></th>
                  <th><b>Reserve Timestamp</b></th>
                  </tr></thead><tbody>";
        foreach ($data as $row) {
            $html .= "<tr>
                <td>{$row['Book_Title']}</td>
                <td>{$row['Author']}</td>
                <td>{$row['Reserved_By']}</td>
                <td>{$row['User_Email']}</td>
                <td>{$row['Contact_No']}</td>
                <td>{$row['Reserved_Date']}</td>
                <td>{$row['Status']}</td>
                <td>{$row['Ready_Date']}</td>
                <td>{$row['Pick_up_Location']}</td>
                <td>{$row['Total_Copies']}</td>
                <td>{$row['Reserve_Timestamp']}</td>
            </tr>";
        }

        $html .= "</tbody></table>";
        $pdf->writeHTML($html, true, false, true, false, '');
        ob_end_clean();
        $pdf->Output($dateNow.'BookReservationReport.pdf', 'D');
        exit;

    } elseif ($export === "EXCEL") {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="'.$dateNow.'BookReservationReport.csv"');

        $output = fopen('php://output', 'w');

        fputcsv($output, ['Book Title', 'Author', 'Reserved By', 
                          'Email', 'Contact No.', 'Reserved Date', 
                          'Status', 'Ready Date', 'Pickup Location', 
                          'All Copies', 'Reserve Timestamp']);
        foreach ($data as $row) {
            fputcsv($output, [$row['Book_Title'], $row['Author'], 
                              $row['Reserved_By'], $row['User_Email'], 
                              $row['Contact_No'], $row['Reserved_Date'],
                              $row['Status'], $row['Ready_Date'], 
                              $row['Pick_up_Location'], $row['Total_Copies'], $row['Reserve_Timestamp']
                             ]);
        }
        fclose($output);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100..900;1,100..900&family=Lilita+One&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>

    <title>LibTrack</title>

</head>
<body>
    <div class="no-select container">
        <div class="container-header">
            <h1> Generate reports for Reserved Books</h1>
        </div>

        <div class="container-form">
            <form id="reportForm" method="POST">
                <div class="container-buttons">
                    <button class="button-back" onclick="location.href = '  ManageFines.php';"><i class="bi bi-arrow-90deg-left" style="font-size:16px;"></i> Back</button>
                </div>
                <div>
                    <div class="form-group1">
                        <label class="label-title" for="category">Category:</label>
                        <select class="dropdown-category" name="category" id="category">
                            <option value="ready">Ready</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>

                <div>
                    <div class="form-group2">
                        <label class="label-title" for="dateRange">Date Range:</label>
                        <span class="label-normal">From</span>
                        <input class="date-startdate" type="date" name="startDate" id="startDate">
                        <span class="label-normal1">To</span>
                        <input class="date-enddate" type="date" name="endDate" id="endDate">
                    </div>
                </div>

                <div>
                    <div class="form-group3">
                        <label class="label-title" for="reportFormat">Report Format:</label>
                        <input class="radio-summarized" type="radio" name="format" id="summarized" value="Summarized" checked>
                        <span class="label-normal1">Summarized</span>
                        <input class="radio-detailed" type="radio" name="format" id="detailed" value="Detailed">
                        <span class="label-normal1">Detailed</span>
                    </div>
                </div>

                <div>
                    <div class="form-group4">
                        <label class="label-title" for="exportAs">Export as:</label>
                        <input class="radio-pdf" type="radio" name="export" id="pdf" value="PDF" checked>
                        <span class="label-normal1">PDF</span>
                        <input class="radio-excel" type="radio" name="export" id="excel" value="EXCEL">
                        <span class="label-normal1">Excel</span>
                    </div>
                </div>
                <button class="gen-report" type="submit">Generate Report</button>
            </form>

            <div id="time-display">
            </div>
        </div>
    </div>

</body>

<style>
    body {
        font-family: poppins;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: start;
        font-size: 24px;
        color: white;
        margin-bottom: 20px;
    }

    .form-group1 {
        margin-bottom: 15px;
        display: inline-flex;
        align-items: center;
    }

    .form-group2 {
        margin-bottom: 15px;
        display: inline-flex;
        align-items: center;
    }

    .form-group3 {
        margin-bottom: 15px;
        display: inline-flex;
        align-items: center;
    }

    .form-group4 {
        margin-bottom: 15px;
        display: inline-flex;
        align-items: center;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .date-startdate {
        width: 200px;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin: 50px 0px 0px 0px;
        align-items: center;
        border: 3px solid #2043D5;
        font-family: poppins;
        font-weight: 400;
    }

    .date-enddate {
        width: 200px;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin: 50px 0px 0px 0px;
        align-items: center;
        border: 3px solid #2043D5;
        font-family: poppins;
        font-weight: 400;
    }

    .dropdown-category {
        width: 400px;
        padding: 10px;
        margin: 50px 0px 0px 225px;
        border: 1px solid #ccc;
        border-radius: 4px;
        align-items: center;
        border: 3px solid #2043D5;
        font-family: poppins;
        font-weight: 400;
    }

    .radio-detailed {
        margin: 50px 0px 0px 175px;
    }

    .radio-summarized {
        margin: 50px 0px 0px 175px;
    }

    .radio-excel {
        margin: 50px 0px 0px 228px;
    }

    .radio-pdf {
        margin: 50px 0px 0px 248px;
    }

    .gen-report {
        height: auto;
        width: auto;
        padding: 10px 20px;
        background-color: white;
        color: #2043D5;
        border: 2px solid #2043D5;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
        margin: 100px 0px 0px 950px;
    }

        .gen-report:hover {
            background-color: #2043D5;
            color: white;
        }


    .container {
        display: flex;
        flex-direction: column;
        height: 700px;
        width: 90%;
        border: 10px solid #2043D5;
        border-radius: 30px 30px 0px 0px;
        margin: 25px 10px 10px 55px;
    }

    .container-header {
        background-color: #2043D5;
        color: #fff;
        width: 100%;
        border-radius: 10px 10px 0px 0px;
        text-indent: 20px;
    }


    .label-title {
        font-family: poppins;
        font-size: 20px;
        font-weight: 600;
        margin-left: 80px;
        margin-top: 55px;
    }

    .label-normal {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin: 50px 20px 0px 205px;
    }

    .label-normal1 {
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        margin: 50px 20px 0px 20px;
    }

    #time-display {
        color: black;
        font-size: 16px;
        font-family: poppins;
        font-weight: 600;
        margin-right: 35px;
        display: flex;
        justify-content: flex-end;
    }

    
    .container-buttons {
        position: absolute;
        margin-left: 30px;
    }

    .button-back {
        height: auto;
        width: auto;
        background-color: transparent;
        border: none;
        color: #000000;
        padding: 0px 0px;
        margin: 15px 10px;
        text-align: start;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-family: poppins;
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
    }
</style>

<script src="script/DateTImeMDYHMS.js"></script>
<script src="script/GeneratePDFExcelBookCirculation.js"></script>
</html>
