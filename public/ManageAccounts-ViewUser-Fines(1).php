<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>LibTrack Homepage</title>
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
                    <th class="delete-rowtitle"></th>
                </tr>
            </table>
            <table class="poppins-regular">
                <tbody>
                    <tr>
                        <td class="booktitles" onclick="location.href = 'ManageAccounts-ViewUser-FinesInfo.html';"> Anxious People </td>
                        <td> PCLIB-2024-503 </td>
                        <td> Damaged Pages </td>
                        <td> 12/12/2024 </td>
                        <td></td>
                        <td> 20.00 </td>
                        <td class="status-unsettled"> Unsettled </td>
                        <td class="delete-row"><button class="delete-btn" onclick="deleteRow(this)">Delete</button></td>
                    </tr>

                    <tr>
                        <td class="booktitles" onclick="location.href = 'ManageAccounts-ViewUser-FinesInfo.html';"> Vanishing Half </td>
                        <td> PCLIB-2024-228 </td>
                        <td> Markings </td>
                        <td> 12/12/2024 </td>
                        <td> 12/14/2024 </td>
                        <td> 20.00 </td>
                        <td class="status-settled"> Settled </td>
                        <td class="delete-row"><button class="delete-btn" onclick="deleteRow(this)">Delete</button></td>
                    </tr>
                </tbody>
            </table>
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

    .profile-content {
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
    .booktitles {
        color: #2043D5;
        cursor: pointer;
    }
    .status-unsettled {
        color: #FF0202;
    }
    .status-settled {
        color: #2BC666;
    }

    .delete-row {
        width: 60px;
    }
    .delete-rowtitle {
        width: 70px;
    }

    .delete-btn {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>
<script src="script/DeleteRow.js"></script>
<script src="script/patronDateTime.js" defer></script>

</html>