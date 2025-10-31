<?php
session_start();
include('db.php');

// Only Admin can access this page
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Delete vendor
if (isset($_GET['delete_vendor'])) {
    $id = $_GET['delete_vendor'];
    mysqli_query($conn, "DELETE FROM vendor WHERE vendor_id = $id");
    header("Location: maintenance.php");
}

// Delete user
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    mysqli_query($conn, "DELETE FROM user WHERE user_id = $id");
    header("Location: maintenance.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Maintenance</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #e3f2fd;
    text-align: center;
}
h2 {
    color: #1e88e5;
}
table {
    margin: 20px auto;
    border-collapse: collapse;
    width: 80%;
}
th, td {
    border: 1px solid #90caf9;
    padding: 10px;
    text-align: center;
}
th {
    background: #42a5f5;
    color: white;
}
a {
    text-decoration: none;
    color: white;
    padding: 5px 10px;
    border-radius: 6px;
}
.delete { background: #e53935; }
.logout { background: #3949ab; }
</style>
</head>
<body>
<h2>🛠 Admin Maintenance Panel</h2>

<a href="admin_dashboard.php" class="logout">🏠 Home</a>
<a href="logout.php" class="logout">Logout</a>

<h3>Vendor Management</h3>
<table>
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Contact</th><th>Action</th>
</tr>
<?php
$result = mysqli_query($conn, "SELECT * FROM vendor");
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['vendor_id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['contact']}</td>
        <td><a href='maintenance.php?delete_vendor={$row['vendor_id']}' class='delete'>Delete</a></td>
    </tr>";
}
?>
</table>

<h3>User Management</h3>
<table>
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Action</th>
</tr>
<?php
$result = mysqli_query($conn, "SELECT * FROM user");
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['user_id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td><a href='maintenance.php?delete_user={$row['user_id']}' class='delete'>Delete</a></td>
    </tr>";
}
?>
</table>

</body>
</html>
