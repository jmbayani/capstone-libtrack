<?php
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acNumber = $_POST['acnumber'];
    $stdNumber = $_POST['stdnumber'];

    $currentDate = date("Y-m-d");
    $currentTime = date("h:i:s A");

    $sqlUpdateA = "UPDATE book_circulation SET Returned_Date = '$currentDate', Returned_Time = '$currentTime' WHERE Accession_Number = '$acNumber'";
    $resultUpdate = $conn->query($sqlUpdateA);

    $sqlUpdateB = "UPDATE book_info SET Book_Status = 'Available' WHERE Accession_Number = '$acNumber'";
    $result = $conn->query($sqlUpdateB);

    if ($sqlUpdateA && $sqlUpdateB) {
        echo "<script>
        alert('Book was successfully borrowed to $stdNumber.');
        window.location.href = 'BorrowBookPage.php';
        </script>";
    }
}
?>