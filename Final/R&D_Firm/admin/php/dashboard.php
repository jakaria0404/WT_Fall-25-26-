<?php 

include "../db/db.php";

$appSql = "SELECT COUNT(*) as total FROM job_applications";
$appResult = mysqli_query($conn, $appSql);
$appRow = mysqli_fetch_assoc($appResult);
$totalApplications = $appRow['total'] ?? 0;

$empSql = "SELECT COUNT(*) as total FROM users WHERE role = 'employee'";
$empResult = mysqli_query($conn, $empSql);
$empRow = mysqli_fetch_assoc($empResult);
$totalEmployees = $empRow['total'] ?? 0;

$taskSql = "SELECT COUNT(*) as total FROM tasks WHERE status = 'completed'";
$taskResult = mysqli_query($conn, $taskSql);
$taskRow = mysqli_fetch_assoc($taskResult);
$completedProjects = $taskRow['total'] ?? 0;

$jobSql = "SELECT COUNT(*) as total FROM job_posts";
$jobResult = mysqli_query($conn, $jobSql);
$jobRow = mysqli_fetch_assoc($jobResult);
$totalJobs = $jobRow['total'] ?? 0;
$totalJobs = $totalJobs;

$jobTaskSql = "SELECT COUNT(*) as total FROM tasks";
$jobTaskResult = mysqli_query($conn, $jobTaskSql);
$jobTaskRow = mysqli_fetch_assoc($jobTaskResult);
$totalTasks = $jobTaskRow['total'] ?? 0;

$memSql = "SELECT COUNT(*) as total FROM users";
$memResult = mysqli_query($conn, $memSql);
$memRow = mysqli_fetch_assoc($memResult);
$totalMembers = $memRow['total'] ?? 0;

$penSql = "SELECT COUNT(*) as total FROM job_applications WHERE status = 'pending'";
$penResult = mysqli_query($conn, $penSql);
$penRow = mysqli_fetch_assoc($penResult);
$pendingApplications = $penRow['total'] ?? 0;

$paySql = "SELECT SUM(amount) as total FROM payments";
$payResult = mysqli_query($conn, $paySql);
$payRow = mysqli_fetch_assoc($payResult);
$totalPayments = number_format($payRow['total'] ?? 0, 2);
?>