<?php
session_start();
include('../db.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Example total (You can calculate dynamically)
$total = 200;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="checkout-page">

    <!-- Grand Total -->
    <div class="checkout-header">
        <h3>Item</h3>
        <p>Grand Total: ₹<?php echo $total; ?>/-</p>
    </div>

    <!-- Details Heading -->
    <div class="details-heading">
        <h3>Details</h3>
    </div>

    <!-- Checkout Form -->
    <form action="checkout_success.php" method="post" class="checkout-form">
        <div class="form-row">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Payment Method</label>
                <select name="payment" required>
                    <option value="">Select</option>
                    <option value="Cash">Cash</option>
                    <option value="UPI">UPI</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" required>
            </div>
            <div class="form-group">
                <label>State</label>
                <input type="text" name="state" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" required>
            </div>
            <div class="form-group">
                <label>Pin Code</label>
                <input type="text" name="pincode" required>
            </div>
        </div>

        <div class="form-submit">
            <button type="submit" class="checkout-btn">Confirm & Pay</button>
        </div>
    </form>

</div>
</body>
</html>
