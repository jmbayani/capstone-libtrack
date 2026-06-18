<?php
include 'db-connect.php';

$uid = isset($_GET['uid']) ? $_GET['uid'] : '';

// Check if UID exists in database
$uidExists = false;
if (!empty($uid)) {
    $stmt = $conn->prepare("SELECT UID FROM rfid_books WHERE UID = ?");
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $uidExists = true;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>RFID UID Check</title>
</head>
<body>
    <h1>RFID UID Status</h1>
    
    <?php if (!empty($uid)): ?>
        <p>Scanned UID: <?php echo htmlspecialchars($uid); ?></p>
        <?php if ($uidExists): ?>
            <p style="color: red;">This UID already exists in the database.</p>
        <?php else: ?>
            <form method="post" action="save_uid.php">
                <label for="uid">UID:</label>
                <input type="text" id="uid" name="uid" value="<?php echo htmlspecialchars($uid); ?>" readonly>
                <button type="submit">Save UID</button>
            </form>
        <?php endif; ?>
    <?php else: ?>
        <p>No UID scanned yet.</p>
    <?php endif; ?>
    
    <script>
        // You might want to add JavaScript to periodically check for new UIDs
        // or refresh the page when a new UID is scanned
        setTimeout(function() {
            location.reload();
        }, 5000); // Reload every 5 seconds
    </script>
</body>
</html>

<?php
$conn->close();
?>