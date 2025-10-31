<?php
session_start();
include('../db.php');

if (!isset($_SESSION['vendor'])) {
    header("Location: login.php");
    exit();
}

// handle status update
if (isset($_POST['update_status'])) {
    $status = $_POST['status'];
    // update query can go here (you can connect with order table later)
    echo "<script>alert('Status updated to: $status');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Status</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="update-page">

    <!-- Header -->
    <div class="update-header">
        <button class="nav-btn" onclick="window.location.href='vendor_portal.php'">Home</button>
        <h2 class="update-title">Update</h2>
        <button class="nav-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>

    <!-- Update Box -->
    <form method="post" class="update-box">
        <div class="update-content">
            <label class="radio-option">
                <input type="radio" name="status" value="Received" required> Received
            </label>
            <label class="radio-option">
                <input type="radio" name="status" value="Ready for Shipping"> Ready for Shipping
            </label>
            <label class="radio-option">
                <input type="radio" name="status" value="Out for Delivery"> Out for Delivery
            </label>
        </div>

        <button type="submit" name="update_status" class="update-submit">Update</button>
    </form>

</div>
</body>
</html>
