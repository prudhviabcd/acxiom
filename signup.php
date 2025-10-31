<?php
include('../db.php');
session_start();

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->query("SELECT * FROM user WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "<script>alert('User already exists!');</script>";
    } else {
        $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
        if ($conn->query($query)) {
            echo "<script>alert('User Registered Successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error while signing up.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Signup</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <!-- Top Section -->
        <div class="top-bar">
            <button onclick="window.location.href='../chart.php'" class="nav-btn">Chart</button>
            <h2>Event Management System</h2>
            <button onclick="window.history.back()" class="nav-btn">Back</button>
        </div>

        <!-- Signup Form -->
        <div class="signup-box">
            <form method="post">
                <div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="User" required>
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="User" required>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="User" required>
                </div>

                <div class="btn-container">
                    <button type="submit" name="signup" class="btn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
