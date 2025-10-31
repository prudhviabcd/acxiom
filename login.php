<?php
include('../db.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM admin WHERE email='$email' AND password='$password'");

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid login credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <!-- 🔹 Top Buttons -->
        <div class="top-buttons">
            <button onclick="window.location.href='../chart.php'">CHART</button>
            <button onclick="window.location.href='../index.php'">BACK</button>
        </div>

        <!-- 🔹 Header -->
        <div class="header">Event Management System</div>

        <!-- 🔹 Login Form -->
        <form method="post">
            <div class="input-group">
                <label>User Id</label>
                <input type="text" name="email" placeholder="Admin" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Admin" required>
            </div>

            <div class="btn-container">
                <button type="reset" class="btn">Cancel</button>
                <button type="submit" name="login" class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
