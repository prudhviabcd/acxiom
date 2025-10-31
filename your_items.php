<?php
session_start();
include('../db.php');
error_reporting(0);

// Check if vendor is logged in
if (!isset($_SESSION['vendor'])) {
    header('Location: login.php');
    exit();
}

// Get vendor email from session
$vendor_email = $_SESSION['vendor'];

// Fetch products belonging to this vendor
$query = "SELECT * FROM products WHERE vendor_email = '$vendor_email'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Items</title>
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
            width: 300px;
            margin: 20px auto;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
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
        img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
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
<h1>Your Items</h1>

<table>
    <tr>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Created At</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td><img src='../uploads/{$row['image']}' alt='Product Image'></td>
                <td>{$row['name']}</td>
                <td>₹{$row['price']}</td>
                <td>{$row['created_at']}</td>
            </tr>
            ";
        }
    } else {
        echo "<tr><td colspan='4'>No products added yet.</td></tr>";
    }
    ?>
</table>

</body>
</html>
