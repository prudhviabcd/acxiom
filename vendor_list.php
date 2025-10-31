<?php
session_start();
include('../db.php'); // Adjust the path if needed

// Disable warnings for cleaner output
error_reporting(0);

// Fetch all vendors from the database
$query = "SELECT vendor_id, name, email, category, contact FROM vendor";
$result = mysqli_query($conn, $query);

// Check if query works
if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor List</title>
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
            margin: 0;
            font-size: 20px;
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
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            text-align: center;
            width: 220px;
            margin: 25px auto;
            padding: 10px;
            border-radius: 8px;
            font-size: 18px;
        }

        .vendor-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin: 30px auto;
            width: 90%;
        }

        .vendor-card {
            background: white;
            width: 230px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .vendor-card:hover {
            transform: translateY(-5px);
        }

        .vendor-card h2 {
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            padding: 8px;
            border-radius: 8px;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .vendor-card p {
            color: #444;
            font-size: 14px;
            margin: 6px 0;
        }

        .shop-btn {
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 10px;
            transition: 0.3s;
        }

        .shop-btn:hover {
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
        }
    </style>
</head>
<body>
    <header>
        <button class="btn" onclick="window.location.href='../user/user_portal.php'">Home</button>
        <h1>Vendor Directory</h1>
        <button class="btn" onclick="window.location.href='../logout.php'">LogOut</button>
    </header>

    <div class="title">Available Vendors</div>

    <div class="vendor-container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($vendor = mysqli_fetch_assoc($result)) {
                echo "
                <div class='vendor-card'>
                    <h2>{$vendor['category']}</h2>
                    <p><strong>Name:</strong> {$vendor['name']}</p>
                    <p><strong>Email:</strong> {$vendor['email']}</p>
                    <p><strong>Contact:</strong> {$vendor['contact']}</p>
                    <button class='shop-btn' onclick=\"window.location.href='shop_items.php?vendor_id={$vendor['vendor_id']}'\">Shop Item</button>
                </div>
                ";
            }
        } else {
            echo "<p style='text-align:center;'>No vendors found.</p>";
        }
        ?>
    </div>
</body>
</html>
