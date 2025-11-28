<?php
include "../PROJECT_SWC_0825/connection.php";

$sql = "SELECT id, reward_name, required_points FROM rewards3";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin – Rewards List</title>
<style>
body {
    font-family: Poppins, sans-serif;
    background: #FFF8F9;
    padding: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: center;
}
th {
    background: #E1D4F7;
    color: #512DA8;
}
tr:nth-child(even) {
    background: #F9F5FF;
}
h2 {
    color: #512DA8;
}
</style>
</head>
<body>

<h2>Available Health Rewards</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Reward Name</th>
        <th>Required Points</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['reward_name']."</td>
                <td>".$row['required_points']."</td>
                <td>
                    <a href='reward-edit.php?id=".$row['id']."'>Edit</a> | 
                    <a href='reward-delete.php?id=".$row['id']."' onclick=\"return confirm('Delete this reward?')\">Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No rewards found</td></tr>";
    }
    ?>
</table>

</body>
</html>
