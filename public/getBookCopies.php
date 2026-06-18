<?php
include 'db-connect.php';

header('Content-Type: application/json');

if (isset($_GET['accession_number'])) {
    $accessionNumber = $_GET['accession_number'];

    $stmt = $conn->prepare("SELECT Quantity, Total_Copies FROM book_copies WHERE Accession_Number = ?");
    $stmt->bind_param("s", $accessionNumber);
    $stmt->execute();
    $stmt->bind_result($quantity, $totalCopies);

    if ($stmt->fetch()) {
        echo json_encode([
            'success' => true,
            'availableCopies' => $quantity,
            'totalCopies' => $totalCopies
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No matching record found.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Accession number is missing.']);
}
