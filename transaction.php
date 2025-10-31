<?php
session_start();
include('../db.php');
error_reporting(0);

// Check if vendor is logged in
if (!isset($_SESSION['vendor'])) {
    header('Location: login.php');
    exit();
}

$vendor_email = $_SESSION['vendor'];

// Fetch transactions related to vendor
$query = "
    SELECT o.order_id, o.user_id, o.total_amount, o.payment_method, o.status, o.city, o.state, o.pincode
    FROM orders o
    ORDER BY o.order_id DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor Transactions</title>
    <style>
        body {
            font-family: Segoe UI, sans-serif;
            background: linear-gradient(135deg, #b0e0fe, #98b0f6);
            text-align: center;
            padding: 20px;
        }
        h1 {
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            padding: 12px;
            border-radius: 10px;
            width: 350px;
            margin: 20px auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #5b86e5;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .home-btn {
            display: inline-block;
            background: #5b86e5;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 10px;
        }
        .home-btn:hover {
            background: #4a6bdc;
        }
    </style>
</head>
<body>

<a href="vendor_home.php" class="home-btn">Home</a>
<h1>Your Transactions</h1>

<table>
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Amount</th>
        <th>Payment Method</th>
        <th>Status</th>
        <th>City</th>
        <th>State</th>
        <th>Pincode</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>{$row['order_id']}</td>
                <td>{$row['user_id']}</td>
                <td>₹{$row['total_amount']}</td>
                <td>{$row['payment_method']}</td>
                <td>{$row['status']}</td>
                <td>{$row['city']}</td>
                <td>{$row['state']}</td>
                <td>{$row['pincode']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No transactions found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
