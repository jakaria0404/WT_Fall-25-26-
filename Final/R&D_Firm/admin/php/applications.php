<?php
session_start();
include "../db/db.php";

$statusFilter = isset($_GET['status']) ? $_GET['status'] : 'pending';
$typeFilter = isset($_GET['type']) ? $_GET['type'] : 'all';
$search = isset($_GET['search']) ? $_GET['search'] : '';
$totalApplications = 0;

$statusSafe = mysqli_real_escape_string($conn, $statusFilter);
$typeSafe = mysqli_real_escape_string($conn, $typeFilter);
$searchSafe = mysqli_real_escape_string($conn, $search);

$sql = "SELECT ja.*, u.username, u.email, u.unique_id, jp.title as job_title, ja.portfolio_link 
        FROM job_applications ja 
        JOIN users u ON ja.user_id = u.unique_id 
        JOIN job_posts jp ON ja.job_id = jp.job_id 
        WHERE ja.status = '$statusSafe'";

if ($typeFilter != 'all') {
    $sql .= " AND jp.type = '$typeSafe'";
}

if ($search != '') {
    $sql .= " AND (u.username LIKE '%$searchSafe%' OR u.email LIKE '%$searchSafe%' OR u.unique_id LIKE '%$searchSafe%')";
}

$sql .= " ORDER BY ja.id DESC";

$result = mysqli_query($conn, $sql);

if ($result) {
    $totalApplications = mysqli_num_rows($result);
} else {
    $totalApplications = 0;
}
?>