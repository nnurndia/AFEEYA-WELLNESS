<?php
include "../PROJECT_SWC_0825/connection.php";

// Ambil ID dari URL
$id = $_GET['id'];

$sql = "SELECT * FROM rewards3 WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Reward</title>
<style>
body { font-family: Poppins; background: #FFF8F9; padding: 20px; }
input, button { padding: 10px; width: 300px; margin-top: 10px; }
label { font-weight: bold; }
button { background:#512DA8; color:white; border:none; cursor:pointer; }
button:hover { background:#3A1C8E; }
</style>
</head>
<body>

<h2>Edit Reward</h2>

<form action="reward-update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Reward Name:</label><br>
    <input type="text" name="reward_name" value="<?php echo $row['reward_name']; ?>" required><br>

    <label>Required Points:</label><br>
    <input type="number" name="required_points" value="<?php echo $row['required_points']; ?>" required><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
