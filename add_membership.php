<?php
session_start();
include('../db.php');

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $plan = $_POST['plan'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO membership (user_id, plan, duration) VALUES ('$user_id', '$plan', '$duration')";
    mysqli_query($conn, $sql);
    echo "<script>alert('Membership Added Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Membership</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="text-align:center; background:#e3f2fd; font-family:'Segoe UI';">
<h2>Add Membership</h2>
<form method="POST">
    <label>User ID:</label><br>
    <input type="text" name="user_id" required><br><br>

    <label>Plan Type:</label><br>
    <input type="radio" name="plan" value="Basic" required> Basic
    <input type="radio" name="plan" value="Premium"> Premium<br><br>

    <label>Duration:</label><br>
    <select name="duration" required>
        <option value="6 months" selected>6 Months</option>
        <option value="1 year">1 Year</option>
        <option value="2 years">2 Years</option>
    </select><br><br>

    <label>
        <input type="checkbox" required> Confirm all fields are correct
    </label><br><br>

    <button type="submit" name="submit">Add Membership</button>
</form>
<br>
<a href="dashboard.php">⬅ Back to Dashboard</a>
</body>
</html>
