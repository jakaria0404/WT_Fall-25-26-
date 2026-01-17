<?php
session_start();
include "../db/db.php";
if(!isset($_SESSION["username"])){
    header("Location: login.php");   
    exit();
}
$currentUser = $_SESSION['username'];
$userQuery = "SELECT unique_id FROM users WHERE username = '$currentUser'";
$userResult = mysqli_query($conn, $userQuery);
$userData = mysqli_fetch_assoc($userResult);
$userId = $userData['unique_id'];

$sql_assigned = "SELECT id FROM tasks WHERE employee_id = '$userId'";
$result_assigned = mysqli_query($conn, $sql_assigned);
$assignedCount = mysqli_num_rows($result_assigned);

$sql_completed = "SELECT id FROM tasks WHERE employee_id = '$userId' AND status = 'completed'";
$result_completed = mysqli_query($conn, $sql_completed);
$completedCount = mysqli_num_rows($result_completed);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Browse job</title>
        <link rel="stylesheet" href="../css/dash.css">
    </head>
    <body>
         <nav class = "navbar">
            <h2>NilKham</h2>
            <ul class = "container">
                <li><a>Home</a></li>
                <li><a>About Us</a></li>
                <li><a>Our services</a></li>
                <li><a href = "browsejob.php">Browse job</a></li>
                <li><a href = "profile.php">Profile</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </nav>
            <div class="sidebar">
            <a href="dashboard.php"style="background-color: #388e3c;">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="myjob.php">My Job Application</a>
        </div>
        <div class="main">
            <div class="welcome-card">
                <h1>Welcome, <?php echo $currentUser; ?>!</h1>
                <p>Employee Portal Dashboard</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Assigned Tasks</h3>
                    <p class="stat-value"><?php echo $assignedCount; ?></p>
                </div>

                <div class="stat-card">
                    <h3>Completed Tasks</h3>
                    <p class="stat-value"><?php echo $completedCount; ?></p>
                </div>

            </div>
        </div>

        <a href = "logout.php" class="logout_btn">Logout</a>
    </body>
</html>