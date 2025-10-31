<?php
session_start();
include('../db.php');

// Check if vendor is logged in
if (!isset($_SESSION['vendor'])) {
    header('Location: login.php');
    exit();
}

$vendor_email = $_SESSION['vendor'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor Home</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #b0e0fe, #98b0f6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            width: 500px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
            text-align: center;
            padding: 30px 20px;
        }
        h1 {
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-size: 22px;
        }
        .btn-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .btn {
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            width: 180px;
            font-size: 16px;
            transition: 0.3s ease;
            text-decoration: none;
        }
        .btn:hover {
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Vendor</h1>
        <div class="btn-container">
            <a href="your_items.php" class="btn">Your Items</a>
            <a href="add_item.php" class="btn">Add New Item</a>
            <a href="transaction.php" class="btn">Transaction</a>
            <a href="../chart.php" class="btn">📊 View Chart</a>

            <a href="logout.php" class="btn">LogOut</a>
        </div>
    </div>
</body>
</html>
