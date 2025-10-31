<?php
session_start();
include('../db.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1️⃣ Check if vendor_id is provided
if (isset($_GET['vendor_id'])) {
    $vendor_id = intval($_GET['vendor_id']);
} elseif (isset($_SESSION['vendor_id'])) {
    $vendor_id = $_SESSION['vendor_id'];
} else {
    echo "<p style='color:red; font-weight:bold;'>❌ Error: Vendor ID not provided.</p>";
    exit();
}

// 2️⃣ Get vendor email using vendor_id
$getVendorEmail = mysqli_query($conn, "SELECT email, name, category, contact FROM vendor WHERE vendor_id = $vendor_id");
if (!$getVendorEmail || mysqli_num_rows($getVendorEmail) == 0) {
    echo "<p style='color:red;'>❌ Vendor not found!</p>";
    exit();
}

$vendor = mysqli_fetch_assoc($getVendorEmail);
$vendor_email = $vendor['email'];

// 3️⃣ Fetch products belonging to this vendor using vendor_email
$query = "SELECT id, name, price, image, created_at FROM products WHERE vendor_email = '$vendor_email'";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop Items</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #b0e0fe, #98b0f6);
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #5b86e5;
            color: white;
            padding: 10px 20px;
        }

        header h1 {
            font-size: 20px;
            margin: 0;
        }

        .btn {
            background: white;
            color: #5b86e5;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn:hover {
            background: #36d1dc;
            color: white;
        }

        .title {
            text-align: center;
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            padding: 10px;
            margin: 25px auto;
            width: 280px;
            border-radius: 8px;
            font-size: 18px;
        }

        .product-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            width: 90%;
            margin: 0 auto 50px auto;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
            width: 230px;
            text-align: center;
            padding: 15px;
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card h3 {
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            padding: 6px;
            border-radius: 8px;
            font-size: 16px;
        }

        .product-card p {
            font-size: 14px;
            color: #444;
            margin: 5px 0;
        }

        .price {
            color: #1a73e8;
            font-weight: bold;
            font-size: 15px;
        }

        .product-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <button class="btn" onclick="window.location.href='vendor_list.php'">Back</button>
        <h1><?php echo $vendor['category']; ?> - <?php echo $vendor['name']; ?></h1>
        <button class="btn" onclick="window.location.href='../logout.php'">Logout</button>
    </header>

    <div class="title">Available Products</div>

    <div class="product-container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($product = mysqli_fetch_assoc($result)) {
                echo "
                <div class='product-card'>
                    <img src='../uploads/{$product['image']}' class='product-img' alt='Product Image'>
                    <h3>{$product['name']}</h3>
                    <p class='price'>₹ {$product['price']}</p>
                    <p><small>Added on: {$product['created_at']}</small></p>
                </div>";
            }
        } else {
            echo "<p style='text-align:center;'>No products found for this vendor.</p>";
        }
        ?>
    </div>
</body>
</html>
