<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rfid = $_POST['rfid'] ?? '';

    if (!empty($rfid)) {
        // Save to file (optional)
        file_put_contents("log.txt", date("Y-m-d H:i:s") . " - RFID: $rfid\n", FILE_APPEND);

        // Query the database
        $stmt = $conn->prepare("SELECT UID FROM rfid_books WHERE UID = ?");
        $stmt->bind_param("s", $rfid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo $row['name']; // Output name if found
        } else {
            echo "Unknown RFID";
        }
    } else {
        echo "No RFID data.";
    }

}
?>