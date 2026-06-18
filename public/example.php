<?php
include "db-connect.php";

$status = "";
$result = null;

if (isset($_POST['available'])) {
    $status = 'Available';
} elseif (isset($_POST['borrowed'])) {
    $status = 'Borrowed';
} elseif (isset($_POST['reserved'])) {
    $status = 'Reserved';
} elseif (isset($_POST['weed_out'])) {
    $status = 'Weed Out';
}  elseif (isset($_POST['for_repair'])) {
    $status = 'For Repair';
}

if ($status) {
    $stmt = $conn->prepare("SELECT book_info.Book_Title, book_info.Author, 
                                   book_info.Shelf_Location, book_info.Accession_Number, book_info.Book_Status,
                                   book_copies.Total_Copies FROM book_info INNER JOIN book_copies 
                                   ON book_info.Accession_Number = book_copies.Accession_Number 
                                   WHERE book_info.Book_Status = ?");
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
}
else {
    $stmt = $conn->prepare("SELECT * FROM book_info");
    $stmt->execute();
    $resultTotal = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Info</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        button {
            margin: 10px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<h2>Book Information</h2>

<form method="POST">
    <button name="available" type="submit">Available Books</button>
    <button name="borrowed" type="submit">Borrowed Books</button>
    <button name="reserved" type="submit">Reserved Books</button>
    <button name="weed_out" type="submit">Weed-Out Books</button>
    <button name="for_repair" type="submit">For Repair Books</button>
</form>

<?php if ($result && $result->num_rows > 0): ?>
    <h3>Showing <?= htmlspecialchars($status) ?> Books</h3>
    <table>
        <tr>
            <?php
            // Output table headers
            $fields = $result->fetch_fields();
            foreach ($fields as $field) {
                echo "<th>" . htmlspecialchars($field->name) . "</th>";
            }
            ?>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <?php foreach ($row as $value): ?>
                    <td><?= htmlspecialchars($value) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endwhile; ?>
    </table>
<?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <p>No records found for status: <?= htmlspecialchars($status) ?></p>
<?php endif; ?>

</body>
</html>
