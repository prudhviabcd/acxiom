<?php
session_start();
include('../db.php');

// Only Admin Access
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance Module</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Segoe UI';
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
            color: #fff;
            text-align: center;
            padding: 50px;
        }
        .box {
            background: white;
            color: black;
            padding: 30px;
            border-radius: 12px;
            width: 400px;
            margin: auto;
        }
        .btn {
            background: linear-gradient(135deg, #5b86e5, #36d1dc);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Maintenance Panel</h2>
        <p>Only Admin can perform maintenance tasks.</p>

        <form action="" method="POST">
            <label>Clean old transactions:</label><br>
            <input type="checkbox" name="clean_transactions"> Confirm<br><br>
            <input type="submit" name="clean" value="Run Maintenance" class="btn">
        </form>

        <br>
        <a href="dashboard.php" class="btn">⬅ Back to Dashboard</a>
    </div>
</body>
</html>

<?php
if (isset($_POST['clean'])) {
    if (isset($_POST['clean_transactions'])) {
        mysqli_query($conn, "DELETE FROM orders WHERE order_amount = 0");
        echo "<script>alert('Maintenance completed successfully!');</script>";
    } else {
        echo "<script>alert('Please confirm before running maintenance.');</script>";
    }
}
?>
