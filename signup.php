<?php
include('../db.php');
session_start();

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $category = $_POST['category'];

    $check = $conn->query("SELECT * FROM admin WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "<script>alert('Admin already exists!');</script>";
    } else {
        $query = "INSERT INTO admin (name, email, password, role) VALUES ('$name', '$email', '$password', '$category')";
        if ($conn->query($query)) {
            echo "<script>alert('Admin Registered Successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error while registering.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Signup</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">Event Management System</div>

        <div class="content-area">
            <!-- LEFT FORM -->
            <div class="form-section">
                <form method="post">
                    <div class="input-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Vendor" required>
                    </div>

                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Vendor" required>
                    </div>

                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Vendor" required>
                    </div>

                    <div class="input-group">
                        <label>Category</label>
                        <select name="category" required>
                            <option value="">Drop Down</option>
                            <option value="Catering">Catering</option>
                            <option value="Florist">Florist</option>
                            <option value="Decoration">Decoration</option>
                            <option value="Lighting">Lighting</option>
                        </select>
                    </div>

                    <div class="btn-container">
                        <button type="submit" name="signup" class="btn">Sign Up</button>
                    </div>
                </form>
            </div>

            <!-- RIGHT CATEGORY BOX -->
            <div class="side-table">
                <ul>
                    <li>Catering</li>
                    <li>Florist</li>
                    <li>Decoration</li>
                    <li>Lighting</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
