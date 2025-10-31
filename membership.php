<?php
session_start();
include('db.php');

if (!isset($_SESSION['user'])) {
    header("Location: user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Add new membership
if (isset($_POST['add'])) {
    $plan = $_POST['plan'];
    $start = date('Y-m-d');
    $months = 6;
    if ($plan == '1 year') $months = 12;
    if ($plan == '2 years') $months = 24;

    $end = date('Y-m-d', strtotime("+$months months", strtotime($start)));

    mysqli_query($conn, "INSERT INTO membership (user_id, plan, start_date, end_date)
                         VALUES ('$user_id', '$plan', '$start', '$end')");
}

// Update membership (extend)
if (isset($_POST['update'])) {
    $plan = $_POST['plan'];
    $months = 6;
    if ($plan == '1 year') $months = 12;
    if ($plan == '2 years') $months = 24;

    mysqli_query($conn, "UPDATE membership 
                         SET end_date = DATE_ADD(end_date, INTERVAL $months MONTH)
                         WHERE user_id = '$user_id'");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Membership</title>
<style>
body {
    background: #f1f8e9;
    font-family: Arial, sans-serif;
    text-align: center;
}
h2 { color: #388e3c; }
form {
    background: white;
    display: inline-block;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
}
select, button {
    padding: 10px;
    margin: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}
button {
    background: #388e3c;
    color: white;
    cursor: pointer;
}
button:hover {
    background: #2e7d32;
}
</style>
</head>
<body>
<h2>🎟 Membership Management</h2>

<form method="post">
    <label>Choose Duration:</label><br>
    <select name="plan" required>
        <option value="6 months">6 months</option>
        <option value="1 year">1 year</option>
        <option value="2 years">2 years</option>
    </select><br>
    <button name="add">Add Membership</button>
    <button name="update">Extend Membership</button>
</form>

<h3>Your Membership Details:</h3>
<table border="1" align="center" cellpadding="8">
<tr><th>Plan</th><th>Start</th><th>End</th></tr>
<?php
$res = mysqli_query($conn, "SELECT * FROM membership WHERE user_id='$user_id'");
while($r = mysqli_fetch_assoc($res)) {
    echo "<tr>
        <td>{$r['plan']}</td>
        <td>{$r['start_date']}</td>
        <td>{$r['end_date']}</td>
    </tr>";
}
?>
</table>

</body>
</html>
