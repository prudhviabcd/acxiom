<?php
include('../db.php');
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Maintain Vendors</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="container">
    <h2>Vendor Maintenance</h2>
    <table border="1" width="100%" cellpadding="10">
      <tr><th>ID</th><th>Name</th><th>Email</th><th>Category</th><th>Action</th></tr>
      <?php
        $res = $conn->query("SELECT * FROM vendor");
        while($row = $res->fetch_assoc()){
          echo "<tr>
                  <td>{$row['vendor_id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['category']}</td>
                  <td><a href='delete_vendor.php?id={$row['vendor_id']}' class='btn'>Delete</a></td>
                </tr>";
        }
      ?>
    </table>
    <a href='dashboard.php' class='btn'>Back</a>
  </div>
</body>
</html>
