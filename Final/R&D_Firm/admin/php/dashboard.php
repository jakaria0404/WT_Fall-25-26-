<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !=='admin') {
    header("Location:../../index.php");
    exit;
}
include "../db/db.php";

$appSql ="SELECT COUNT(*) as total FROM job_applications";
$appResult = $conn->query($appSql);
$appRow = $appResult->fetch_assoc();
$totalApplications =$appRow['total'] ?? 0;

$empSql = "SELECT COUNT(*) as total FROM users WHERE role = 'employee'";
$empResult = $conn->query($empSql);
$empRow = $empResult->fetch_assoc();
$totalEmployees = $empRow['total'] ?? 0;

$taskSql = "SELECT COUNT(*) as total FROM tasks WHERE status = 'completed'";
$taskResult = $conn->query($taskSql);
$taskRow = $taskResult->fetch_assoc();
$completedProjects = $taskRow['total'] ?? 0;

$jobSql = "SELECT COUNT(*) as total FROM job_posts";
$jobResult = $conn->query($jobSql);
$jobRow = $jobResult->fetch_assoc();
$totalJobs = $jobRow['total'] ?? 0;


$totalJobsKpi = $totalJobs;
$totalMembersSql = "SELECT COUNT(*) as total FROM users";
$totalMembersResult = $conn->query($totalMembersSql);
$totalMembersRow = $totalMembersResult->fetch_assoc();
$totalMembers = $totalMembersRow['total'] ?? 0;

$pendingAppsSql = "SELECT COUNT(*) as total FROM job_applications WHERE status = 'pending'";
$pendingAppsResult = $conn->query($pendingAppsSql);
$pendingAppsRow = $pendingAppsResult->fetch_assoc();
$pendingApplications = $pendingAppsRow['total'] ?? 0;

$totalPaymentsSql = "SELECT SUM(amount) as total FROM payments";
$totalPaymentsResult = $conn->query($totalPaymentsSql);
$totalPaymentsRow = $totalPaymentsResult->fetch_assoc();
$totalPayments = number_format($totalPaymentsRow['total'] ?? 0, 2);