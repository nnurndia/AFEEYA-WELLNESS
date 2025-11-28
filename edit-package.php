<?php
include "../PROJECT_SWC_0825/connection.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM packages03 WHERE id='$id'"));
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Package</title>
<style>
 body { font-family:Poppins; padding:20px; }
 input, textarea {
   width:100%; padding:10px; margin-bottom:10px; border-radius:8px;
 }
 button {
   background:#512DA8; color:white; padding:10px 16px; border:none; border-radius:8px;
 }
</style>
</head>

<body>

<h2>Edit Package</h2>

<form method="POST">
  <label>Package Name</label>
  <input type="text" name="package_name" value="<?= $data['package_name']; ?>" required>

  <label>Price (RM)</label>
  <input type="number" step="0.01" name="price" value="<?= $data['price']; ?>" required>

  <label>Description</label>
  <textarea name="description"><?= $data['description']; ?></textarea>

  <button type="submit">Update</button>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['package_name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    mysqli_query($conn, "UPDATE packages03 SET 
        package_name='$name', price='$price', description='$desc'
        WHERE id='$id'");

    header("Location: admin-view-packages.php");
}
?>

</body>
</html>
