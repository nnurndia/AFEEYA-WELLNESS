<?php
include "../PROJECT_SWC_0825/connection.php";

$id = $_POST['id'];
$reward_name = $_POST['reward_name'];
$required_points = $_POST['required_points'];

$sql = "UPDATE rewards3 
        SET reward_name='$reward_name',
            required_points='$required_points'
        WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: admin-view-rewards.php");
} else {
    echo "Error updating reward: " . mysqli_error($conn);
}
?>
