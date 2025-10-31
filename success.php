<?php
session_start();
include('../db.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// You can fetch these dynamically after payment confirmation
$total = 200;
$name = "John Doe";
$number = "9876543210";
$email = "johndoe@email.com";
$payment = "UPI";
$address = "ABC Street";
$state = "Telangana";
$city = "Hyderabad";
$pincode = "500001";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout Success</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="success-page">

    <!-- Popup Box -->
    <div class="popup">
        <h2>PopUp</h2>
        <h3>THANK YOU</h3>

        <div class="total-box">
            <h4>Total Amount: ₹<?php echo $total; ?>/-</h4>
        </div>

        <!-- User Details -->
        <div class="details-box">
            <div class="detail-row">
                <div class="detail"><strong>Name:</strong> <?php echo $name; ?></div>
                <div class="detail"><strong>Number:</strong> <?php echo $number; ?></div>
            </div>

            <div class="detail-row">
                <div class="detail"><strong>Email:</strong> <?php echo $email; ?></div>
                <div class="detail"><strong>Payment:</strong> <?php echo $payment; ?></div>
            </div>

            <div class="detail-row">
                <div class="detail"><strong>Address:</strong> <?php echo $address; ?></div>
                <div class="detail"><strong>State:</strong> <?php echo $state; ?></div>
            </div>

            <div class="detail-row">
                <div class="detail"><strong>City:</strong> <?php echo $city; ?></div>
                <div class="detail"><strong>PinCode:</strong> <?php echo $pincode; ?></div>
            </div>
        </div>

        <button class="continue-btn" onclick="window.location.href='user_portal.php'">Continue Shopping</button>
    </div>

</div>
</body>
</html>
