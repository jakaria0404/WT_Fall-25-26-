<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
    $_SESSION['role'] = 'admin';
}

include "../db/db.php";


$totalApplications = 0;
$totalEmployees = 0;
$completedProjects = 0;
$totalJobs = 0;
$totalMembers = 0;
$pendingApplications = 0;
$totalPayments = 0;

if ($conn && !$conn->connect_error) {
    
    $appSql = "SELECT COUNT(*) as total FROM job_applications";
    $appResult = $conn->query($appSql);
    if ($appResult) {
        $appRow = $appResult->fetch_assoc();
        $totalApplications = $appRow['total'] ?? 0;
    }

    
    $empSql = "SELECT COUNT(*) as total FROM users WHERE role = 'employee'";
    $empResult = $conn->query($empSql);
    if ($empResult) {
        $empRow = $empResult->fetch_assoc();
        $totalEmployees = $empRow['total'] ?? 0;
    }

   
    $taskSql = "SELECT COUNT(*) as total FROM tasks WHERE status = 'completed'";
    $taskResult = $conn->query($taskSql);
    if ($taskResult) {
        $taskRow = $taskResult->fetch_assoc();
        $completedProjects = $taskRow['total'] ?? 0;
    }

   
    $jobSql = "SELECT COUNT(*) as total FROM job_posts";
    $jobResult = $conn->query($jobSql);
    if ($jobResult) {
        $jobRow = $jobResult->fetch_assoc();
        $totalJobs = $jobRow['total'] ?? 0;
    }

    $totalJobsKpi = $totalJobs;

    $totalMembersSql = "SELECT COUNT(*) as total FROM users";
    $totalMembersResult = $conn->query($totalMembersSql);
    if ($totalMembersResult) {
        $totalMembersRow = $totalMembersResult->fetch_assoc();
        $totalMembers = $totalMembersRow['total'] ?? 0;
    }

   
    $pendingAppsSql = "SELECT COUNT(*) as total FROM job_applications WHERE status = 'pending'";
    $pendingAppsResult = $conn->query($pendingAppsSql);
    if ($pendingAppsResult) {
        $pendingAppsRow = $pendingAppsResult->fetch_assoc();
        $pendingApplications = $pendingAppsRow['total'] ?? 0;
    }

    
    $totalPaymentsSql = "SELECT SUM(amount) as total FROM payments";
    $totalPaymentsResult = $conn->query($totalPaymentsSql);
    if ($totalPaymentsResult) {
        $totalPaymentsRow = $totalPaymentsResult->fetch_assoc();
        $totalPayments = number_format($totalPaymentsRow['total'] ?? 0, 2);
    }
}
?>