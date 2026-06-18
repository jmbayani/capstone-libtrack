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
                    <th class="rowtitledate">Date</th>
                    <th class="rowtitleactivitytype">Activity Type</th>
                    <th class="rowtitledetails">Details</th>
                </tr>
            </table>
            <table class="poppins-regular">
                <tbody>
                    <tr class="bookcheckout">
                        <td class="rowdate"> 12/11/2024 </td>
                        <td class="rowactivitytype"> Book Checked Out </td>
                        <td class="rowdetails">
                            Jane Doe checked out "Anxious People", "To Kill a Mockingbird", "The Vanishing Half".
                            Due date for all books is Dec 12, 2024.
                        </td>
                    </tr>
                    <tr class="bookreturn">
                        <td class="rowdate"> 12/04/2024 </td>
                        <td class="rowactivitytype"> Book Returned </td>
                        <td class="rowdetails">
                            Jane Doe returned "Pride and Prejudice" on time. No fines incurred
                        </td>
                    </tr>
                    <tr class="bookrenew">
                        <td class="rowdate"> 12/03/2024 </td>
                        <td class="rowactivitytype"> Book Renewed </td>
                        <td class="rowdetails">
                            Jane Doe renewed "Pride and Prejudice". New due date is Dec 4, 2024.
                        </td>
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


    ::-webkit-scrollbar {
        display: none;
    }

    .rowrdesc {
        color: #2043D5;
        cursor: pointer;
    }

    .status-unsettled {
        color: #FF0202;
    }

    .status-settled {
        color: #2BC666;
    }



    .rowtitledate {
        width: 10px;
    }
    .rowtitleactivitytype {
        width: 5px;
    }
    .rowtitledetails {
        width: 70px;
    }

  

    .rowdate {
        width: 90px;
    }

    .rowactivitytype {
        width: 100px;
    }

    .rowdetails {
        width: 450px;
    }

  

    .delete-btn {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .bookcheckout {
        background-color: #fb9f9f;
    }
   
    .bookrenew {
        background-color: #ebfb90;
    }
    .bookreturn {
        background-color: #87f9b3;
    }

</style>
<script src="script/DeleteRow.js"></script>
<script src="script/patronDateTime.js" defer></script>

</html>