<?php
session_start();
if (!isset($_SESSION['vendor'])) {
    header("Location: login.php");
    exit();
}
$vendor = $_SESSION['vendor'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="vendor-container">
        <div class="dashboard-box">
            <div class="welcome-box">
                <h2>Welcome<br><?php echo ucfirst($vendor); ?></h2>
            </div>

            <div class="vendor-buttons">
                <button onclick="window.location.href='your_items.php'">Your Item</button>
                <button onclick="window.location.href='add_item.php'">Add New Item</button>
                <button onclick="window.location.href='transaction.php'">Transaction</button>
                <button onclick="window.location.href='logout.php'">Logout</button>
            </div>
        </div>
    </div>
</body>
</html>
