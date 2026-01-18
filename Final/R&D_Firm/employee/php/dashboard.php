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

$sql_payment = "SELECT SUM(amount) AS total FROM payments WHERE employee_id = '$userId'";
$paymentResult = mysqli_query($conn, $sql_payment);
$paymentData = mysqli_fetch_assoc($paymentResult);
$totalPayments = $paymentData['total'] ?? "0.00"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Browse job</title>
        <link rel="stylesheet" href="../css/dashboard.css">
    </head>
    <body>
         <nav class = "navbar">
            <h2>NilKham</h2>
            <ul class = "container">
                <li><a href = "home.php">Home</a></li>
                <li><a href = "browsejob.php">Browse job</a></li>
                <li><a href = "profile.php">Profile</a></li>
            </ul>
        </nav>
            <div class="sidebar">
            <a href="dashboard.php"style="background-color: #388e3c;">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="myjob.php">My Job Application</a>
            <a href="task.php">Tasks</a>
        </div>
        <div class="main">
            <div class="welcome-card">
                <h1>Welcome, <?php echo $currentUser; ?>!</h1>
                <p>Employee Portal Dashboard</p>
            </div>

            <div class="content">
                <div class="part">
                    <h3>Assigned Tasks</h3>
                    <p class="value"><?php echo $assignedCount; ?></p>
                </div>

                <div class="part">
                    <h3>Completed Tasks</h3>
                    <p class="value"><?php echo $completedCount; ?></p>
                </div>

                 <div class="part">
                    <h3>Total Payments</h3>
                    <p class="value">$<?php echo $totalPayments; ?></p>
                </div>
                
            </div>
        </div>

    </body>
</html>