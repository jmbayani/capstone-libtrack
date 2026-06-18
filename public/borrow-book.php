<?php
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acNumber = $_POST['acnumber'];
    $stdNumber = $_POST['stdnumber'];

    $currentDate = date("Y-m-d");
    $currentTime = date("h:i:s A");
    $nextDate = date("Y-m-d", strtotime("+1 day"));

    $prefix = "Transaction-";

    $sql = "SELECT Transaction_ID FROM book_circulation WHERE Transaction_ID LIKE '$prefix%' ORDER BY Transaction_ID DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastId = $row['Transaction_ID'];
        $lastNumber = intval(substr($lastId, -4));
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT); 
    } else {
        $newNumber = "0001";
    }

    $transaction = $prefix . $newNumber;

    $stmt = $conn->prepare("
                            INSERT INTO book_circulation (Transaction_ID, Accession_Number, Username, Borrowed_Date, Date_to_Return, Borrowed_Time)
                            VALUES (?, ?, ?, ?, ?, ?)
                            ");
    $stmt->bind_param("ssssss", $transaction, $acNumber, $stdNumber, $currentDate, $nextDate, $currentTime);
    $stmt->execute();

    $sqlUpdate = "UPDATE book_info SET Book_Status = 'Borrowed' WHERE Accession_Number = '$acNumber'";
    $result = $conn->query($sqlUpdate);

    if ($result) {
        echo "<script>
        alert('Book was successfully borrowed to $stdNumber.');
        window.location.href = 'BorrowBookPage.php';
        </script>";
    }
}
?>