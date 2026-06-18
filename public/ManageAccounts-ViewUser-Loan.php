<?php
session_start();
include "db-connect.php";

$username = $_SESSION['username'];

    // Fetch book details from the database
    $sql = "
    SELECT
        bi.Book_Title,
        bi.Author,
        bc.Accession_Number,
        bc.Borrowed_Date,
        bc.Returned_Date,
        bc.Username
    FROM
        book_circulation bc
    JOIN
        book_info bi ON bi.Accession_Number = bc.Accession_Number
    WHERE
        Username = ?;
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>LibTrack Homepage</title>
</head>
<body class='poppins-regular'>
    <div class="no-select profile-content">
        <div class="profile-loaned-info">
            <table class="poppins-bold">
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Accession No.</th>
                    <th>Date Borrowed</th>
                    <th>Date to Returned</th>
                    <th>On Hold</th>
                </tr>
            </table>
            <?php if($result ->num_rows > 0):?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <table  class="poppins-regular">
                        <tr>
                            <td class="booktitles" onclick="location.href = 'ManageAccounts-ViewUser-LoanInfo.php?accession_number=<?= htmlspecialchars($row['Accession_Number'])?>';"> <?= htmlspecialchars($row['Book_Title'])?> </td>
                            <td> <?= htmlspecialchars($row['Author'])?> </td>
                            <td> <?= htmlspecialchars($row['Accession_Number'])?> </td>
                            <td> <?= htmlspecialchars($row['Borrowed_Date'])?> </td>
                            <td> <?= htmlspecialchars($row['Returned_Date'])?> </td>
                            <td> <i id="goStatusPage" class="bi bi-flag-fill" data-username= "<?php echo htmlspecialchars($username); ?>"> </i> </td>
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
        padding: 8px;
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

    .bi-flag-fill{
        font-size: 20px;
        cursor: pointer;
    }
    .bi-flag-fill:hover{
        color: #2043D5;
    }
</style>
<script src="script/patronDateTime.js" defer></script>
<script src="script/FlagUser.js" defer></script>
</html>