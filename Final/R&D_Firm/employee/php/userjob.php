<?php
session_start();
include "../db/db.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$currentUser = $_SESSION['username'];

$userQuery = "SELECT unique_id FROM users WHERE username = '$currentUser'";
$userResult = mysqli_query($conn, $userQuery);
$userData = mysqli_fetch_assoc($userResult);
$userId = $userData['unique_id'];

$sql = "SELECT job_posts.title, job_posts.type, job_applications.status, job_applications.phase, job_applications.created_at 
        FROM job_applications 
        JOIN job_posts ON job_applications.job_id = job_posts.job_id 
        WHERE job_applications.user_id = '$userId' 
        ORDER BY job_applications.created_at DESC";

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
            <li><a href="home.php">Home</a></li>
            <li><a href="browsejob.php">Browse job</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </nav>

    <div class="sidebar">
        <a href="profile.php">Profile</a>
        <a href="myjob.php" style="background-color: #45a049;">My Job Application</a>
 
    </div>

    <div class="content">
        <div class="table">
            <h1>My Job Applications</h1>
            <table class="job-table">
                <tr>
                    <th><b>Job Title</b></th>
                    <th><b>Type</b></th>
                    <th><b>Status</b></th>
                    <th><b>Phase</b></th>
                </tr>
                <?php 
                if ($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['phase']; ?></td>
                    </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='4' style='text-align:center;'>No applications found.</td></tr>";
                } 
                ?>
            </table>
        </div>
    </div>
</body>
</html>
