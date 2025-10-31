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
  <title>Membership Management</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="container">
    <h2>Manage Memberships</h2>
    <form method="post">
      <label>Vendor ID:</label><br>
      <input type="number" name="vendor_id" required><br>
      <label>Duration (in months):</label><br>
      <input type="number" name="duration" required><br>
      <input type="submit" name="add" value="Add Membership" class="btn">
    </form>

    <h3>Existing Memberships</h3>
    <table border="1" width="100%" cellpadding="10">
      <tr><th>ID</th><th>Vendor ID</th><th>Duration</th><th>Start Date</th><th>End Date</th></tr>
      <?php
        $res = $conn->query("SELECT * FROM membership");
        while($row = $res->fetch_assoc()){
          echo "<tr>
            <td>{$row['membership_id']}</td>
            <td>{$row['vendor_id']}</td>
            <td>{$row['duration']}</td>
            <td>{$row['start_date']}</td>
            <td>{$row['end_date']}</td>
          </tr>";
        }
      ?>
    </table>
    <a href='dashboard.php' class='btn'>Back</a>
  </div>
</body>
</html>

<?php
if(isset($_POST['add'])){
  $vid = $_POST['vendor_id'];
  $duration = $_POST['duration'];
  $start = date('Y-m-d');
  $end = date('Y-m-d', strtotime("+$duration months", strtotime($start)));
  $conn->query("INSERT INTO membership(vendor_id, duration, start_date, end_date) VALUES('$vid','$duration','$start','$end')");
  echo "<script>alert('Membership added successfully');window.location='membership.php';</script>";
}
?>
