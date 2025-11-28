<?php
include "../PROJECT_SWC_0825/connection.php";

$sql = "SELECT * FROM messages3 ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin - View Messages</title>
<style>
 body {
    font-family: Poppins, sans-serif;
    padding: 20px;
    background: #FFF8F9;
 }
 h1 { color:#512DA8; text-align:center; }
 a.back {
    display:inline-block; margin-bottom:20px;
    padding:8px 14px; background:#512DA8; 
    color:white; border-radius:8px; text-decoration:none;
 }
 table {
    width:100%; border-collapse:collapse; background:white;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
 }
 th, td {
    border:1px solid #ddd; padding:10px; text-align:center; 
 }
 th { background:#F8BBD0; color:#512DA8; }
 .btn-delete {
    background:#E53935; color:white; padding:5px 10px;
    border-radius:6px; text-decoration:none;
 }
</style>
</head>

<body>

<h1>Contact Messages</h1>
<a class="back" href="admin.html">← Back to Admin Dashboard</a>

<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Subject</th>
  <th>Message</th>
  <th>Date</th>
  <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) : ?>
<tr>
  <td><?= $row['id']; ?></td>
  <td><?= $row['name']; ?></td>
  <td><?= $row['email']; ?></td>
  <td><?= $row['subject']; ?></td>
  <td><?= $row['message']; ?></td>
  <td><?= $row['date_sent']; ?></td>
  <td><a class="btn-delete" href="delete-message.php?id=<?= $row['id']; ?>">Delete</a></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
