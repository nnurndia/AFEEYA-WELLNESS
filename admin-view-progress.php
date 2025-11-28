<?php
session_start();
include "../PROJECT_SWC_0825/connection.php";

$sql = "SELECT wp.*, u.fullname 
        FROM progress3 wp
        LEFT JOIN users3 u ON wp.user_id = u.id
        ORDER BY wp.id DESC";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin - View Workout Progress | Afeeya Wellness</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #FFF8F9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #512DA8;
            text-align: center;
            margin-bottom: 20px;
        }
        a.back {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            background: #512DA8;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
            text-align: center;
        }
        th {
            background: #F8BBD0;
            color: #512DA8;
        }
        tr:nth-child(even) {
            background: #FDF1F5;
        }
        tr:hover {
            background: #F8EAF6;
        }
        .btn-delete {
            color: white;
            background: #e53935;
            padding: 5px 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }
        .btn-delete:hover {
            background: #b71c1c;
        }
    </style>
</head>
<body>

<h1>Workout Progress Records</h1>

<a href="admin.html" class="back">← Back to Admin Dashboard</a>

<table>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Day</th>
        <th>Workout Type</th>
        <th>Duration (min)</th>
        <th>Calories</th>
        <th>Notes</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['fullname'] ? $row['fullname'] : 'User '.$row['user_id']; ?></td>
        <td><?php echo $row['day']; ?></td>
        <td><?php echo $row['workout_type']; ?></td>
        <td><?php echo $row['duration']; ?></td>
        <td><?php echo $row['calories']; ?></td>
        <td><?php echo $row['notes']; ?></td>
        <td>
            <a class="btn-delete"
               href="delete-progress.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Delete this progress record?');">
                Delete
            </a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

</body>
</html>
