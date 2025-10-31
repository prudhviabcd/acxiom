<?php
include('../db.php');
session_start();
if (!isset($_SESSION['vendor'])) {
    header("Location: login.php");
    exit();
}
$vendor = $_SESSION['vendor'];

// Add Product
if (isset($_POST['add_product'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_FILES['product_image']['name'];
    $target = "../uploads/" . basename($image);

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target)) {
        $query = "INSERT INTO products (vendor_email, name, price, image) 
                  VALUES ('$vendor', '$name', '$price', '$image')";
        $conn->query($query);
    }
}

// Delete Product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
}

// Fetch Products
$result = $conn->query("SELECT * FROM products WHERE vendor_email='$vendor'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item - Vendor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="vendor-page">

    <!-- HEADER SECTION -->
    <div class="vendor-header">
        <div class="welcome-box">Welcome '<?php echo ucfirst($vendor); ?>'</div>
        <div class="vendor-nav">
            <button>Product Status</button>
            <button>Request Item</button>
            <button>View Product</button>
            <button onclick="window.location.href='logout.php'">Log Out</button>
        </div>
    </div>

    <!-- MAIN BODY -->
    <div class="vendor-body">

        <!-- LEFT FORM -->
        <div class="add-box">
            <form method="post" enctype="multipart/form-data">
                <div class="input-set">
                    <label>Product Name</label>
                    <input type="text" name="product_name" required>
                </div>
                <div class="input-set">
                    <label>Product Price</label>
                    <input type="number" name="product_price" required>
                </div>
                <div class="input-set">
                    <label>Product Image</label>
                    <input type="file" name="product_image" required>
                </div>
                <div class="add-btn">
                    <button type="submit" name="add_product">Add The Product</button>
                </div>
            </form>
        </div>

        <!-- RIGHT TABLE -->
        <div class="product-table">
            <table>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><img src="../uploads/<?php echo $row['image']; ?>" width="60" height="60"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>₹<?php echo $row['price']; ?></td>
                    <td>
                        <a href="add_item.php?delete=<?php echo $row['id']; ?>" class="delete">Delete</a>
                        <a href="update_item.php?id=<?php echo $row['id']; ?>" class="update">Update</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
