<?php
include('../db.php');
$id = $_GET['id'];
$conn->query("DELETE FROM user WHERE user_id=$id");
header("Location: maintain_user.php");
?>
