<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users3 WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        if ($password == $row['password']) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];

            header("Location: index.html"); 
            exit();

        } else {
            echo "<script>alert('Wrong password!'); window.location='login.php';</script>";
            exit();
        }

    } else {
        echo "<script>alert('Email not found!'); window.location='login.php';</script>";
        exit();
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>LOGIN | AFEEYA WELLNESS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'poppins', sans-serif;
            background-color: #FFF8F9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #F8BBD0;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            color: #512DA8;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .login-container {
            width: 520px;
            margin: 80px auto;
            background-color: #FFF8F9;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.25);
        }
        .login-container:hover {
            transform: scale(1.01);
        }
        h2 {
            text-align: center;
            color: #512DA8;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
            background-color: #512DA8;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #3A1C8E;
        }
        p { text-align: center; font-size: 14px; margin-top: 10px; }
        a { color: #512DA8; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>

<body>

<header>
    <h1>Afeeya <span style="color:#333;">Wellness</span></h1>
</header>

<div class="login-container">
    <h2>Login</h2>
    
    <form action="login.php" method="POST">
        
        <label>Email</label>
        <input type="email" name="email" required>
        
        <label>Password</label>
        <input type="password" name="password" required>
        
        <button type="submit" class="btn">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
</div>

</body>
</html>
