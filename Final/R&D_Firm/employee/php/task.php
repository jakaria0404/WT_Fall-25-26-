<?php
session_start();
include "../db/db.php"; 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$currentUser = $_SESSION['username'];
$submitted_msg = isset($_GET['submitted']);
$error_msg = ""; 
$msg = "";

$userQuery = "SELECT unique_id FROM users WHERE username = '$currentUser'";
$userResult = mysqli_query($conn, $userQuery);
$userData = mysqli_fetch_assoc($userResult);
$emp_unique_id = $userData['unique_id']; 

if (isset($_POST['submit_task'])) {
    $tid = $_POST['task_id'];
    $submission = trim($_POST['submission']); 
    
    if (empty($submission)) {
        $error_msg = "Submission field cannot be empty!";
    } else {
        $sql_update = "UPDATE tasks SET status = 'completed', submission = '$submission' WHERE id = $tid AND employee_id = '$emp_unique_id'";
        if (mysqli_query($conn, $sql_update)) {
            $msg = "Task Completed Successfully!";
        } else {
            $error_msg = "Something went wrong";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Tasks</title>
    <link rel="stylesheet" href="../css/task.css">
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
        <a href="myjob.php">My Job Application</a>
        <a href="task.php" style="background-color: #388e3c;">Tasks</a>
    </div>

    <div class="main">
        <h1>My Tasks</h1>
        
        <?php if ($msg) echo "<p style='color:green; font-weight:bold;'>$msg</p>"; ?>
        <?php if ($submitted_msg) echo "<p style='color:green; font-weight:bold;'>Task Completed Successfully!</p>"; ?>
        <?php if ($error_msg) echo "<p style='color:red; font-weight:bold;'>$error_msg</p>"; ?>

        <?php
        $sql_tasks = "SELECT * FROM tasks WHERE employee_id = '$emp_unique_id' AND status != 'completed'";
        $result_tasks = mysqli_query($conn, $sql_tasks);

        if (mysqli_num_rows($result_tasks) > 0) {
            while ($row = mysqli_fetch_assoc($result_tasks)) {
        ?>
            <div class="card">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <p><strong>Status:</strong> <?php echo strtoupper($row['status']); ?></p>
                
                <div style="margin-top:10px;">
                        <form method="POST">
                            <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                            <input type="text" name="submission">
                            <button type="submit" name="submit_task" class="btn">Submit Project</button>
                        </form>
                </div>
            </div>
        <?php 
            }
        } else {
            echo "<p>No active task</p>";
        }
        ?>
    </div>

</body>
</html>