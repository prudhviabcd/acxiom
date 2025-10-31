<?php
include('../db.php');
$id = $_GET['id'];
$conn->query("DELETE FROM cart WHERE cart_id=$id");
header("Location: cart.php");
?>
