<?php
include "../php/auth.php";
include_once "../db/db.php";

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
        if($newStatus=='passed'){
            mysqli_query($conn,"
                UPDATE users u 
                JOIN job_applications ja ON u.unique_id = ja.user_id 
                JOIN job_posts jp ON ja.job_id = jp.job_id 
                SET u.role = 'employee' 
                WHERE ja.id = '$id'
            ");
            mysqli_query($conn,"
                INSERT INTO employees (unique_id, name, username, category, rank) 
                SELECT 
                    u.unique_id, 
                    CONCAT(u.first_name,' ',u.last_name), 
                    u.username, 
                    jp.type, 
                    u.rank 
                FROM users u 
                JOIN job_applications ja ON u.unique_id = ja.user_id 
                JOIN job_posts jp ON ja.job_id = jp.job_id 
                WHERE ja.id = '$id' 
                ON DUPLICATE KEY UPDATE 
                    name = VALUES(name), 
                    username = VALUES(username), 
                    category = VALUES(category), 
                    rank = VALUES(rank)
            ");
        }
        header("Location: applications.php?status=$statusFilter&success=1");
    } else {
        header("Location: applications.php?status=$statusFilter&error=failed");
    }
} else {
    header("Location: applications.php?status=$statusFilter&error=invalid");
}

exit();
?>