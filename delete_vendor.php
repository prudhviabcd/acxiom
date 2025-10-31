<?php
include('../db.php');
$id = $_GET['id'];
$conn->query("DELETE FROM vendor WHERE vendor_id=$id");
header("Location: maintain_vendor.php");
?>
