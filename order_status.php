<?php
session_start();
include('../db.php');

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Order Status</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="order-status-page">

    <!-- Header Section -->
    <div class="header-bar">
        <button class="nav-btn" onclick="window.location.href='user_portal.php'">Home</button>
        <h2 class="page-title">User Order Status</h2>
        <button class="nav-btn" onclick="window.location.href='../logout.php'">LogOut</button>
    </div>

    <!-- Main Table Box -->
    <div class="status-box">
        <table class="status-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT name, email, address, status FROM orders WHERE user_id='$user_id'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
