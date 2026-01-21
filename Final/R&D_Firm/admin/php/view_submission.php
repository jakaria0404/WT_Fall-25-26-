<?php
include "auth.php";
include_once "../db/db.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM tasks WHERE id = '$id'");
$task = mysqli_fetch_assoc($res);

if (!$task) {
    header("Location: ../html/tasks.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Submission</title>
</head>
<body>

    <center>
        <h2>Task Submission Details</h2>
    </center>

    <p><b>Task ID:</b> #<?= $task['id']; ?></p>
    <p><b>Task Title:</b> <?= htmlspecialchars($task['title']); ?></p>
    <p><b>Status:</b> <?= $task['status']; ?></p>

    <hr>

    <h3>Employee Submission:</h3>
    <p>
        <?php 
        if ($task['submission']) {
            echo htmlspecialchars($task['submission']);
        } else {
            echo "No content submitted yet.";
        }
        ?>
    </p>

    <hr>

    <a href="../html/tasks.php">Go Back</a>

</body>
</html>