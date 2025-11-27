<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $goal = $_POST['goal'];

    $sql = "INSERT INTO users3 (fullname, email, password, age, goal)
            VALUES ('$fullname', '$email', '$password', '$age', '$goal')";

    if (mysqli_query($conn, $sql)) {
        header("Location: registration-successful.html");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>REGISTRATION  |  AFEEYA WELLNESS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<style>
		body {
			font-family: 'poppins' , sans-serif;
			background-color; #FFF8F9;
			color: #333;
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
		.register-container {
			width: 520px;
			margin: 80px auto;
			background-color: #FFF8F9;
			padding: 40px 50px;
			border-radius: 15px;
			box-shadow: 0 4px 15px rgba(0,0,0,0.25);
			transition 0.3s;
		}
		
		.register-container:hover {
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
			color: #333;
		}
		input[type="text"],
		input[type="email"],
		input[type="password"],
		input[type="number"]
		select {
			width: 100%;
			padding: 16px;
			margin-bottom: 20px;
			border: 1.5px solid #bbb;
			border-radius: 10px;
			font-family: 'poppins', sans-serif;
			font-size: 17px;
			box-sizing: border-box;
			transition: 0.3 ease;
		}
		
		input[type="number"] {
			width: 100%;
			height: 55px;
			font-size: 17px;
			padding: 0 15px;
			border-radius: 10px;
			border: 1.5px solid #bbb;
			appearance: none;
			box-sizing: border-box;
		}
		
		select {
			width: 100%;
			height: 55px;
			font-size: 17px;
			padding: 0 15px;
			border-radius: 10px;
			border: 1.5px solid #bbb;
			appearance: textfield;
		    background-color: #fff;
			box-sizing: border-box;
			cursor: pointer;
			color: #333;
		}
		
		input:focus,
		select:focus {
			outline: none;
			border-color: #A7C7E7;
			box-shadow: 0 0 6px rgba(81, 45, 168, 0.3);
			transform: scale(1.02);
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
			transition: 0.3;
		}
		.btn:hover {
			background-color: #3A1C8E;
		}
		p {
			text-align: center;
			font-size: 14px;
			margin-top: 10px;
		}
		a {
			color: #512DA8;
			text-decoration: none;
		}
		a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	
	<!-- HEADER -->
	<header>
		<h1>Afeeya <span style="color:#333;">Wellness</span></h1>
	</header>
	
	<!-- REGISTRATION FORM -->
	<div class="register-container">
		<h2>Register</h2>
		<form action="register.php" method="POST">
			<label for="fullname">Full Name</label>
			<input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
			
			<label for="email">Email</label>
			<input type="email" id="email" name="email" placeholder="Enter your email" required>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Create a password" required>
			
			<label for="age">Age</label>
			<input type="number" id="age" name="age" placeholder="Enter your age" min="13" max="70" required>
			
			
			<!--SELECTED GOAL-->
			<label for="goal">Fitness Goal</label>
			<select id="goal" name="goal" required>
			    <option value="">Select your goal</option>
				<option value="lose-weight">Lose Weight</option>
				<option value="build-strength">Build Strength</option>
				<option value="stay-healthy">Stay Healthy</option>
				<option value="increase stamina">Increase Stamina</option>
			</select>
			
			<button type="submit" class="btn">Register</button>
		</form>
		<p>Already have an account? <a href="login.html">Login here</a></p>
	</div>
</body>
</html>
