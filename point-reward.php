<!doctype html>

<?php
session_start();
include "connection.php";

// -------------- CHECK USER LOGIN --------------
if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// -------------- GET USER POINTS --------------
$sql = "SELECT points FROM users3 WHERE id = '$user_id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$points = $row['points'];

// -------------- REDEEM PROCESS --------------
if (isset($_POST['redeem'])) {

    $reward_name = $_POST['reward_name'];
    $required = $_POST['required_points'];

    if ($points >= $required) {

        $new_points = $points - $required;
        mysqli_query($conn, "UPDATE users3 SET points='$new_points' WHERE id='$user_id'");

        mysqli_query($conn, "
            INSERT INTO rewards3(user_id, reward_name, required_points)
            VALUES ('$user_id', '$reward_name', '$required')
        ");

        echo "<script>
            alert('Successful! You redeemed: $reward_name');
            window.location='point-reward.php';
        </script>";
    }
    else {
        echo "<script>
            alert('Not enough points!');
            window.location='point-reward.php';
        </script>";
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>HEALTH POINT REWARD | AFEEYA WELLNES</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	
	<style>
		body {
			font-family: 'Poppins', sans-serif;
			background: linear-gradient(135deg, #F8BBD0, #A7C7E7);
			margin: 0;
			padding 0;
			color: #333;
		}
		
		/* NAVBAR*/
		nav {
			background-color: #F8BBD0;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 12px 0;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
			position: sticky;
			top: 0;
			z-index: 100;
		}
		nav a {
			color: #512DA8;
			text-decoration: none;
			font-weight: 600;
			margin: 0 18px;
			font-size: 16px;
			transition: 0.3s;
		}
		nav a:hover {
			color: #3A1C8E;
			text-decoration: underline;
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
		.points-section {
			text-align: center;
			background-color: #FFF8F9;
			margin: 30px auto;
			width: 80%;
			max-width: 500px;
			border-radius: 12px;
			padding: 20px;
			box-shadow: 0 3px 10px rgba(0,0,0,0.2);
		}
		.points-section h2 {
			color: #512DA8;
			font-size: 22px;
			margin-bottom: 10px;
		}
		.points-section p {
			font-size: 16px;
		}
		.rewards-container {
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
			gap: 25px;
			padding: 20px;
		}
		.reward-card {
			background: #FFF8F9;
			border-radius: 15px;
			width: 260px;
			padding: 25px;
			text-align: center;
			box-shadow: 0 2px 10px rgba(0,0,0,0.2);
			transition: 0.3s;
		}
		.reward-card:hover {
			transform: translateY(-5px);
		}
		.reward-card h3 {
			color: #512DA8;
			font-size: 20px;
			margin-bottom: 10px;
		}
		..reward-card p {
			margin: 5px 0 15px;
			font-size: 15px;
		}
		.btn {
			display: inline-block;
			background: linear-gradient(135deg, #512DA8, #7E57C2);
			color: white;
			padding: 10px 20px;
			border-radius: 30px;
			text-decoration: none;
			font-weight: 600;
			box-shadow: 0 3px 10px rgba(81,45,168,0.3);
			transition: 0.3s;
			cursor: pointer;
		}
		.btn:hover {
			background: linear-gradient(135deg, #A7C7E7, #512DA8);
			transform: scale(1.05);
		}
		.quote {
			text-align: center;
			margin: 40px auto;
			width: 80%;
			font-style: italic;
			color: #512DA8;
			background: #FFF8F9;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 2px 10px rgba(0,0,0,0.1);
		}
		.home-btn {
			display: block;
			width: fit-content;
			margin: 40px auto;
			background: linear-gradient(135deg, #A7C7E7, #512DA8);
			padding: 12px 30px;
			border-radius: 50px;
			color: white;
			text-decoration: none;
			font-weight: 600;
			box-shadow: 0 3px 12px rgba(81,45,168,0.3);
			transition: 0.3s;
		}
		.home-btn:hover {
			transform: scale(1.05);
			background: linear-gradient(135deg, #F8BBD0, #7E57C2);
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
		<a href="package.html">Packages</a>
		<a href="point-reward.php">Rewards</a>
		<a href="contact.html">Contact</a>
	</nav>
	
	<header>
	  <h1>Afeeya <span style="color: #333;">Wellness</span></h1>
	</header>
	
	<!-- POINT SECTION -->
	<div class="points-section">
	    <h2>You currently have 
    <span style="color:#3A1C8E;">
        <?php echo $points; ?> Health Points!
    </span>
</h2>
		<p>Keep moving, Afeeya Warrior - every rep brings you closer to your glow</p>
	</div>
	
	<!-- REWARD CARDS -->
	<div class="rewards-container">
	    <div class="reward-card">
		    <h3>Free protein Drink</h3>
			<p>Required: 50 Points</p>
			<button class="btn" onclick="location.href='redeem-success.html'">Redeem Now</button>
		</div>
		
		<div class="reward-card">
		    <h3>Afeeya Wellness T-shirt</h3>
			<p>Required: 100 Points</p>
			<button class="btn" onclick="location.href='redeem-success.html'">Redeem Now</button>
		</div>
		
		<div class="reward-card">
		    <h3>Spa Voucher</h3>
			<p>Required: 200 Points</p>
			<button class="btn" onclick="location.href='redeem-success.html'">Redeem Now</button>
		</div>
		
		<div class="reward-card">
		    <h3>1 Month Free Membership</h3>
			<p>Required: 300 Points</p>
			<button class="btn" onclick="location.href='redeem-success.html'">Redeem Now</button>
		</div>
	</div>
		 
	<!-- MOTIVATIONAL QUOTE -->
	<div class="quote">
	   "Every drop of sweat brings you closer to your glow - keep shining, Afeeya Queen"
	</div>
	
	<!-- HOMEPAGE BUTTON -->
	<a href="index.html" class="home-btn">Back to Homepage</a>
	
	<footer>
	   <p>© 2025 Afeeya Wellness | Women's Gym | Designed by Ainnur Nadia</p>
	</footer>
	
</body>
</html>
