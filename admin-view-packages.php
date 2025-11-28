<?php
include "../PROJECT_SWC_0825/connection.php";

$result = mysqli_query($conn, "SELECT * FROM packages03 ORDER BY id ASC");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin - Packages</title>
<style>
 body { font-family:Poppins; padding:20px; background:#FFF8F9; }
 h1 { color:#512DA8; text-align:center; }
 a.add, a.back {
    padding:8px 14px; border-radius:8px; text-decoration:none; margin-bottom:20px; display:inline-block;
 }
 a.add { background:#512DA8; color:white; }
 a.back { background:#A7C7E7; color:white; }
 table { width:100%; border-collapse:collapse; background:white; }
 th,td { border:1px solid #ddd; padding:10px; text-align:center; }
 th { background:#F8BBD0; color:#512DA8; }
 .btn-delete { background:#E53935; color:white; padding:5px 10px; border-radius:6px; text-decoration:none; }
 .btn-edit { background:#7E57C2; color:white; padding:5px 10px; border-radius:6px; text-decoration:none; }
</style>
</head>

<body>

<h1>Membership Packages</h1>
<a class="back" href="admin.html">← Back</a>
<a class="add" href="add-package.php">+ Add New Package</a>

<table>
<tr>
  <th>ID</th>
  <th>Package Name</th>
  <th>Price (RM)</th>
  <th>Description</th>
  <th>Actions</th>
</tr>

<?php while($p = mysqli_fetch_assoc($result)) : ?>
<tr>
  <td><?= $p['id']; ?></td>
  <td><?= $p['package_name']; ?></td>
  <td><?= $p['price']; ?></td>
  <td><?= $p['description']; ?></td>
  <td>
    <a class="btn-edit" href="edit-package.php?id=<?= $p['id']; ?>">Edit</a>
    <a class="btn-delete" href="delete-package.php?id=<?= $p['id']; ?>">Delete</a>
  </td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
