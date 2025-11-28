<?php
include "../PROJECT_SWC_0825/connection.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM messages3 WHERE id = '$id'");
header("Location: admin-view-messages.php");
exit();
?>
