<?php include('../db.php'); session_start();
if(!isset($_SESSION['vendor'])){ header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Request Item</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="container">
    <h2>Request an Item</h2>
    <form method="post">
      <input type="text" name="item_name" placeholder="Item Name" required><br>
      <input type="text" name="details" placeholder="Details" required><br>
      <input type="submit" name="request" value="Submit Request" class="btn">
    </form>
    <a href="dashboard.php" class="btn">Back</a>
  </div>
</body>
</html>

<?php
if(isset($_POST['request'])){
  $item_name = $_POST['item_name'];
  $details = $_POST['details'];
  $vendor_email = $_SESSION['vendor'];
  $vendor_id = $conn->query("SELECT vendor_id FROM vendor WHERE email='$vendor_email'")->fetch_assoc()['vendor_id'];
  $conn->query("INSERT INTO requests(vendor_id, item_name, details) VALUES('$vendor_id','$item_name','$details')");
  echo "<script>alert('Request submitted successfully');</script>";
}
?>
