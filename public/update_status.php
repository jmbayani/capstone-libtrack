<?php
include_once 'db-connect.php';

if (isset($_GET['user'])) {
    $username = $_GET['user'];

    // Get current status
    $stmt = $conn->prepare("SELECT Status FROM monitoring_user WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $currentStatus = $result['Status'];

    // Cycle through statuses:  In Progress and On Hold 
    $statusCycle = ['In Progress', 'On Hold'];
    $currentIndex = array_search($currentStatus, $statusCycle);
    $newStatus = $statusCycle[($currentIndex + 1) % count($statusCycle)];

    // Update status
    $updateStmt = $conn->prepare("UPDATE monitoring_user SET Status = ? WHERE Username = ?");
    $updateStmt->bind_param("ss", $newStatus, $username);
    $success = $updateStmt->execute();

    echo json_encode([
        "success" => $success,
        "message" => $success ? "Status updated to $newStatus" : "Failed to update status."
    ]);
} else {
    echo json_encode(["success" => false, "message" => "No username specified"]);
}
?>
