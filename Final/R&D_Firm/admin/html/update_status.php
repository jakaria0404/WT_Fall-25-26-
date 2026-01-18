<?php
session_start();
include "../db/db.php";

$id = $_GET['id'] ?? '';
$action = $_GET['action'] ?? '';
$statusFilter = $_GET['status'] ?? 'pending';

if (!$id || !$action) {
    header("Location: applications.php?error=missing");
    exit();
}

$id = mysqli_real_escape_string($conn, $id);

$statusMap = [
    'shortlist' => 'interview_selected',
    'pass'      => 'passed',
    'reject'    => 'rejected'
];

if (isset($statusMap[$action])) {
    $newStatus = $statusMap[$action];
    $sql = "UPDATE job_applications SET status = '$newStatus' WHERE id = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: applications.php?status=$statusFilter&success=1");
    } else {
        header("Location: applications.php?status=$statusFilter&error=failed");
    }
} else {
    header("Location: applications.php?status=$statusFilter&error=invalid");
}

exit();
?>