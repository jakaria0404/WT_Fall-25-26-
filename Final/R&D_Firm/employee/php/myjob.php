<?php
session_start();
include "../db/db.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$currentUser = $_SESSION['username'];

$userQuery = "SELECT user_id FROM users WHERE username = '$currentUser'";
$userResult = mysqli_query($conn, $userQuery);
$userData = mysqli_fetch_assoc($userResult);
$userId = $userData['user_id'];

$sql = "SELECT (SELECT title FROM job_posts WHERE id = job_applications.job_id) AS title,(SELECT type FROM job_posts WHERE id = job_applications.job_id) AS type, status, phase, created_at FROM job_applications 
WHERE user_id = '$userId'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Job Applications</title>
    <link rel="stylesheet" href="../css/myjob.css">
</head>
<body>
    <nav class="navbar">
        <h2>NilKham</h2>
        <ul class="container">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="browsejob.php">Browse job</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </nav>

    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php">Profile</a>
        <a href="myjob.php" style="background-color: #45a049;">My Job Application</a>
    </div>

    <div class="content">
        <div class="table">
            <h1>My Job Applications</h1>
            <table class="job-table">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Phase</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result && mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) { 
                    ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['phase']; ?></td>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='4' style='text-align:center;'>No applications found.</td></tr>";
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
