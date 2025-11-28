<?php
include "../PROJECT_SWC_0825/connection.php";

$id = $_GET['id'];

$sql = "DELETE FROM rewards3 WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: admin-view-rewards.php");
} else {
    echo "Error deleting reward: " . mysqli_error($conn);
}
?>
