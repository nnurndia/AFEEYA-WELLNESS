<?php

include '../PROJECT SWC 0825/connection.php';

// REGISTERED MEMBERS
$sqlUsers = "
    SELECT id, fullname, email, age, goal, package_selected, points, created_at
    FROM users3
    ORDER BY created_at DESC
";
$usersResult = mysqli_query($conn, $sqlUsers);

// SIMPLE COUNTS 
function getCount($conn, $tableName) {
    $res = mysqli_query($conn, "SELECT COUNT(*) AS total FROM $tableName");
    if ($res && $row = mysqli_fetch_assoc($res)) {
        return $row['total'];
    }
    return 0;
}

$totalUsers     = getCount($conn, 'users3');
$totalProgress  = getCount($conn, 'progress3');
$totalPackages  = getCount($conn, 'packages03');
$totalMessages  = getCount($conn, 'messages03');
$totalRewards   = getCount($conn, 'rewards03');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD | AFEEYA WELLNESS</title>
	
	<style>
	   body {
			font-family: 'Poppins' , sans-serif;
			background: linear-gradient(135deg, #F8BBD0, #A7C7E7);
			margin: 0;
			padding: 0;
			color: #333;
            display: flex;
		}
		
		.sidebar {
			width: 250px;
			background-color: #F8BBD0;
			color: #512DA8;
			padding: 20px;
			box-shadow: 2px 0 10px rgba(0,0,0,0.1);
			display: flex;
			flex-direction: column;
			justify-content: space-between;
            height: 100vh;
            box-sizing: border-box;
		}
		
		.sidebar h2 {
			text-align: center;
			color: #512DA8;
			margin-bottom: 30px;
		}
		
		.menu a {
			display: block;
			color: #512DA8;
			text-decoration: none;
			padding: 12px 15px;
			border-radius: 8px;
			font-weight: 600;
			transition: 0.3s;
		}
		
		.menu a:hover {
			background-color: #E1D4F7;
			transform: scale(1.05);
		}
		
		.logout-btn {
			background-color: #512DA8;
			color: white;
			text-align: center;
			padding: 12px;
			border-radius: 8px;
			text-decoration: none;
			transition: 0.3s;
			display: block;
			margin-top: 20px;
		}
		
		.logout-btn:hover {
			background-color: #3A1C8E;
			transform: scale(1.05);
		}
		
		.main-content {
			flex: 1;
			padding: 30px;
            box-sizing: border-box;
		}
		
		
		header {
			background-color: #E1D4F7;
			padding: 15px 25px;
			color: #512DA8;
		    border-radius: 10px;
			margin-bottom: 30px;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
		}
		
		
		h1 {
			margin: 0;
			font-size: 24px;
		}
		
        .summary-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
        }

        .summary-card {
            background: #FFF8F9;
            padding: 12px 16px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            font-size: 14px;
            min-width: 150px;
        }

        .summary-card span.count {
            font-weight: 700;
            color: #512DA8;
        }

		.section {
			background-color: #FFF;
			border-radius: 12px;
			padding: 25px;
			box-shadow: 0 4px 10px rgba(0,0,0,0.1);
			margin-bottom: 30px;
		}
		
		h2 {
			color: #512DA8;
			margin-bottom: 15px;
		}
		
		table {
			width: 100%;
		    border-collapse: collapse;
			text-align: center;
		}
		
		th, td {
			border: 1px solid #ccc;
			padding: 12px;
			font-size: 15px;
		}
		
		th {
			background-color: #E1D4F7;
			color: #512DA8;
		}
		
		tr:nth-child(even) {
			background-color: #F9F5FF;
		}
		
		tr:hover {
			background-color: #F8EAF6;
			transition: 0.3s;
		}

        .small-text {
            font-size: 12px;
            color: #777;
        }
		
		footer {
			background-color: #F8BBD0;
			text-align: center;
			padding: 15px;
			font-size: 14px;
			color: #333;
            margin-top: 20px;
		}
	</style>
</head>

<body>
	
	<div class="sidebar">
	    <div>
		  <h2>Admin Dashboard</h2>
			<div class="menu">
			    <a href="#members">Registered Members</a>
				<a href="#classes">Manage Classes</a>
				<a href="#messages">Messages</a>
				<a href="#packages">Membership Packages</a>
				<a href="#rewards">Health Rewards</a>
				<a href="#profile">Admin Profile</a>
			</div>
		</div>
		<a href="login-admin.php" class="logout-btn">Logout</a>
	</div>
	
	<div class="main-content">
	    <header>
	       <h1>Welcome, Admin of Afeeya Wellness</h1>
           <div class="summary-cards">
                <div class="summary-card">
                    Total Members: <span class="count"><?php echo $totalUsers; ?></span>
                </div>
                <div class="summary-card">
                    Workout Records: <span class="count"><?php echo $totalProgress; ?></span>
                </div>
                <div class="summary-card">
                    Packages: <span class="count"><?php echo $totalPackages; ?></span>
                </div>
                <div class="summary-card">
                    Messages: <span class="count"><?php echo $totalMessages; ?></span>
                </div>
                <div class="summary-card">
                    Rewards: <span class="count"><?php echo $totalRewards; ?></span>
                </div>
           </div>
	    </header>
		
        <!-- REGISTER MEMBERS -->
	    <div class="section" id="members">
		  <h2>Registered Members</h2>
	      <table>
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Fitness Goal</th>
                <th>Package Selected</th>
                <th>Points</th>
                <th>Joined At</th>
            </tr>
            <?php
            $no = 1;
            if ($usersResult && mysqli_num_rows($usersResult) > 0) {
                while ($row = mysqli_fetch_assoc($usersResult)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['goal']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['package_selected']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['points']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No members registered yet.</td></tr>";
            }
            ?>
		  </table>
          <p class="small-text">* Data diambil dari jadual <b>users3</b> dalam database.</p>
        </div>
		
        <!-- MANAGE CLASSES -->
		<div class="section" id="classes">
			<h2>Manage Classes & Workout Progress</h2>
			<p>
                View and manage workout records submitted by members.<br>
                <a href="admin-view-progress.php">➡ Open Workout Progress Page</a>
            </p>
		</div>
			
        <!-- MESSAGES -->
		<div class="section" id="messages">
			<h2>Contact Messages</h2>
			<p>
                All messages sent from the Contact Us page will appear here.<br>
                <a href="admin-view-messages.php">➡ View Messages</a>
            </p>
		</div>
			
        <!-- PACKAGES -->
	    <div class="section" id="packages">
			<h2>Membership Packages</h2>
			<p>
                View and update membership packages (Basic, Premium, VIP).<br>
                <a href="admin-view-packages.php">➡ Manage Packages</a>
            </p>
		</div>
			
        <!-- REWARDS -->
	    <div class="section" id="rewards">
			<h2>Health Rewards</h2>
			<p>
                Manage member health points and reward redemption.<br>
                <a href="admin-view-rewards.php">➡ View Rewards Redemptions</a>
            </p>
		</div>
			
        <!-- PROFILE -->
        <div class="section" id="profile">
			<h2>Admin Profile</h2>
			<p>Change password, update admin info or photo. (Static for now – you can add a form later).</p>
		</div>
	
	    <!-- FOOTER-->
	    <footer>
	         <p>© 2025 Afeeya Wellness | Women's Gym | Designed by Ainnur Nadia</p>
	    </footer>
    </div>
		
</body>
</html>
