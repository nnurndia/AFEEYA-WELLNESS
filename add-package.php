<?php include "../PROJECT_SWC_0825/connection.php"; ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Package</title>
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

<h2>Add New Package</h2>

<form method="POST" action="">
  <label>Package Name</label>
  <input type="text" name="package_name" required>

  <label>Price (RM)</label>
  <input type="number" step="0.01" name="price" required>

  <label>Description</label>
  <textarea name="description" required></textarea>

  <button type="submit">Save</button>
</form>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['package_name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    mysqli_query($conn, "INSERT INTO packages03(package_name, price, description)
                         VALUES ('$name','$price','$desc')");

    header("Location: admin-view-packages.php");
}
?>

</body>
</html>
