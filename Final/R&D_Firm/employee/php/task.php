<?php
session_start();
include "../db/db.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$u_name = $_SESSION['username'];
$msg = "";

if(!isset($_SESSION['unique_id'])){
    $u_query = mysqli_query($conn, "SELECT unique_id FROM users WHERE username = '$u_name'");
    $u_data = mysqli_fetch_assoc($u_query);
    $_SESSION['unique_id'] = $u_data['unique_id'];
}

$user_id = $_SESSION['unique_id'];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn'])){
    $sub_text = trim($_POST['submission']);
    if($sub_text != ""){
        $sql_update = "UPDATE tasks SET submission = '$sub_text', status = 'completed' 
                       WHERE employee_id = '$user_id' AND status != 'completed'";
        if(mysqli_query($conn, $sql_update)){
            $msg = "Task submitted successfully!";
        }
    } else {
        $msg = "Please enter your work details.";
    }
}

$sql = "SELECT * FROM tasks WHERE employee_id = '$user_id'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
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
        <a href="task.php"style="background-color: #388e3c;">Tasks</a>
    </div>

   <div class="main">
        <h1>My Tasks</h1>
        <?php if ($submitted_msg) echo "<p style='color:green; font-weight:bold;'>ask Completed Successfully!</p>"; ?>
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
                    <?php if ($row['status'] == 'pending'): ?>
                        <a href="?update_status=1&id=<?php echo $row['id']; ?>&status=in_progress" class="btn">Start Work</a>
                    <?php else: ?>
                        <form method="POST">
                            <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                            <input type="text" name="submission">
                            <button type="submit" name="submit_task" class="btn">Submit Project</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
