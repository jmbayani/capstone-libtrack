<?php
include "db-connect.php";

$sql = "SELECT 
    bi.Book_Title, fp.Penalty_To, 
    fp.User_Email, fp.Penalty_Issued_Date, 
    fp.Amount, fp.Status,
    fp.Penalty_By, fp.Settled_By
    FROM book_info bi
    JOIN fines_penalties fp 
    ON bi.Accession_Number = fp.Accession_Number;
    ";
$result = $conn->query($sql);

$fines = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fines[] = [
            'bookTitle' => $row['Book_Title'],
            'name' => $row['Penalty_To'],
            'email' => $row['User_Email'],
            'penaltyDate' => $row['Penalty_Issued_Date'],
            'amount' => '$' . number_format($row['Amount'], 2),
            'status' => $row['Status'],
            'penaltyBy' => $row['Penalty_By'],
            'settledBy' => $row['Settled_By']
        ];
    }
}

echo json_encode($fines);
?>