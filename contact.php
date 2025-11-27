<?php
include "connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject']; 
$message = $_POST['message'];

$sql = "INSERT INTO messages3 (fullname, email, message)
        VALUES ('$name', '$email', '$message')";


$sql = "INSERT INTO messages3 (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

if (mysqli_query($conn, $sql)) {
    header("Location: contact-success.html");
} else {
    echo "Error: " . mysqli_error($conn);
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT-US | AFEEYA WELLNESS</title>
	
	<style>
	  body {
			font-family: 'Poppins' , sans-serif;
			background: linear-gradient(135deg, #F8BBD0, #A7C7E7);
			margin: 0;
			padding: 0;
			color: #333;
		}
		
		nav {
			backrgound-color: #F8BBD0;
			display: flex;
			justify-content: center;
			align-items: center;
			gap: 25px;
			padding: 12px 0;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
			position: sticky; 
			top: 0;
			z-index: 100;
		}
		
		nav a, .dropbtn {
			color: #512DA8;
			text-decoration: none;
			font-weight: 600;
			font-size: 16px;
			transition: 0.3s;
			padding: 8px 14px;
			background: none;
			border: none;
			cursor: pointer;
			font-family: 'Poppins', sans-serif;
		}
		
		nav a:hover, .dropbtn:hover {
			color: #3A1C8E;
		}
		
		header {
			text-align: center;
			padding: 25px 0 10px;
			color: #512DA8;
		}
		
		header h1 {
			margin: 0;
			font-size: 28px;
		}
		
		.section-title {
			background-color: #FFF8F9;
			width: 70%;
			margin: 30px auto;
			padding: 15px;
			border-radius: 15px;
			text-align: center;
			color: #512DA8;
			font-size: 24px;
			font-weight: 600;
			box-shadow: 0 3px 8px rgba(0,0,0,0,0.15);
		}
		
		.contact-container {
			background-color: #FFF8F9;
			width: 70%;
			margin: 30px auto;
			padding: 15px;
			border-radius: 15px;
			text-align: center;
			color: #512DA8;
			font-size: 24px;
			font-weight: 600;
			box-shadow: 0 3px 8px rgba(0,0,0,0.15);
		}
		
		.contact-info {
			flex: 1;
			min-width: 300px;
		}
		
		.contact-info h3 {
			color: #512DA8;
		}
		
		.contact-info p {
			font-size: 15px;
			color: #555;
			line-height: 1.6;
		}
		
		.contact-form {
			flex: 1;
			min-width: 300px;
		}
		
		form {
			display: flex;
			flex-direction: column;
		}
		
		input, textarea {
			padding: 12px;
			margin: 8px 0;
			border-radius: 10px;
			font-family:'Poppins', sans-serif;
			resize: none;
		}
		
		input:focus, textarea:focus {
			outline: none;
			border-color: #A7C7E7;
		}
		
		button {
		    margin-top: 10px;
		    padding: 12px;
		    background: linear-gradient(135deg, #A7C7E7, #512DA8);
			color: white;
			border: none;
			border-radius: 25px;
			fonr-weight: 600;
			cursor: pointer;
			transition: 0.3s;
		}
		
		.button:hover {
			transform: scale(1.05);
			background: linear-gradient(135deg, #F8BBD0, #7E57C2);
		}
		
		.map-container {
			width: 85%;
			margin: 40px auto;
			border-radius: 15px;
			overflow: hidden;
			box-shadow: 0 3px 12px rgba(0,0,0,0.2);
		}
		
		iframe {
			width: 100%;
			height: 300px;
			border: none;
		}
		
		footer {
			background-color: #F8BBD0;
			text-align: center;
			padding: 15px;
			font-size: 14px;
			color: #333;
		}
	</style>
</head>

<body>
	
	<!-- NAVBAR -->
	<nav>
	    <a href="index.html">Home</a>
		<a href="classes.html">Classes</a>
		<a href="Tips.html">Tips</a>
		<a href="package.html">Packages</a>
		<a href="point-reward.php">Rewards</a>
		<a href="contact.php">Contact</a>
	</nav>
	
	<header>
	  <h1>Afeeya <span style="color: #333;">Wellness</span></h1>
	</header>
	
	<div class="section-title">Get in Touch With us</div>
	
	<div class="contact-container">
	  <div class="contact-info">
		  <h3>Our Location</h3>
		  <p>Afeeya Wellness Center<br>
		  Jalan Harmoni 3, Putrajaya<br>
		  Malaysia</p>
		  
		  <h3>Contact Details</h3>
		  <p>+60 12-345 6789<br>
		  info@afeeyawellness.com.my</p>
		  
		  <h3>Opening Hours</h3>
		  <p>Mon - Fri: 9:00 AM - 9:00 PM<br>
		  Sat - Sun: 10:00 AM - 7:00 PM</p>
		  
		  <div class="contact-form">
		    <form action="contact.php" method="POST">
			    <input type="text" name="name" placeholder="Your Name" required>
				<input type="email" name="email" placeholder="Your Email" required>
				<input type="text" name="subject" placeholder="Subject" required>
				<textarea name="message" rows="5" placeholder="Write your message here..." required></textarea>
				<button type="submit">Send Message</button>
			  </form>
		  </div>
		</div>
		
		<div class="map-container">
		   <iframe src="https://www.google.com/maps/embed?pb=!m18!..." allowfullscreen="" loading="lazy"></iframe>
		</div>
		
		<!-- FOOTER-->
	<footer>
	     <p>© 2025 Afeeya Wellness | Women's Gym | Designed by Ainnur Nadia</p>
	</footer>
		
	</div>
</body>
</html>
