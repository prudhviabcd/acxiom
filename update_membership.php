<?php
session_start();
include('../db.php');

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

if (isset($_POST['update'])) {
    $membership_id = $_POST['membership_id'];
    $duration = $_POST['duration'];

    $sql = "UPDATE membership SET duration='$duration' WHERE id='$membership_id'";
    mysqli_query($conn, $sql);
    echo "<script>alert('Membership Updated Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Membership</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="text-align:center; background:#fce4ec; font-family:'Segoe UI';">
<h2>Update Membership</h2>
<form method="POST">
    <label>Membership ID:</label><br>
    <input type="text" name="membership_id" required><br><br>

    <label>Extend Duration:</label><br>
    <select name="duration" required>
        <option value="6 months">6 Months</option>
        <option value="1 year">1 Year</option>
        <option value="2 years">2 Years</option>
    </select><br><br>

    <button type="submit" name="update">Update</button>
</form>
<br>
<a href="dashboard.php">⬅ Back to Dashboard</a>
</body>
</html>
