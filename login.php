<?php
include('../db.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM user WHERE email='$email' AND password='$password'");
    if ($result->num_rows > 0) {
        $_SESSION['user'] = $email;
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
    <title>User Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">Event Management System</div>

        <div class="content-area">
            <!-- LOGIN FORM -->
            <div class="form-section">
                <form method="post">
                    <div class="input-group">
                        <label>User Id</label>
                        <input type="email" name="email" placeholder="User" required>
                    </div>

                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="User" required>
                    </div>

                    <div class="btn-container">
                        <button type="reset" class="btn">Cancel</button>
                        <button type="submit" name="login" class="btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
