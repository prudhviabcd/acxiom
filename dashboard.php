<?php 
include('../db.php');
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="container">
    <h2>Welcome User</h2>
    <table border="1" width="100%" cellpadding="10">
      <tr><th>ID</th><th>Product</th><th>Price</th><th>Image</th><th>Action</th></tr>
      <?php
        $res = $conn->query("SELECT * FROM product");
        while($row = $res->fetch_assoc()){
          echo "<tr>
                  <td>{$row['product_id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['price']}</td>
                  <td><img src='../uploads/{$row['image']}' width='80'></td>
                  <td><a href='cart.php?id={$row['product_id']}' class='btn'>Add to Cart</a></td>
                </tr>";
        }
      ?>
    </table>
    <div class="buttons">
      <a href="cart.php" class="btn">View Cart</a>
      <a href="logout.php" class="btn" style="background:#e74c3c;">Logout</a>
    </div>
  </div>
</body>
</html>
