<?php
include "../db/db.php";
$success = "";
$error = "";
$title = "";
$description = "";
$requirements = "";
$type = "";


$jobsSql = "SELECT * FROM job_posts ORDER BY created_at DESC";
$jobsResult = $conn->query($jobsSql);
$jobs = [];
if ($jobsResult && $jobsResult->num_rows > 0) {
    while ($row = $jobsResult->fetch_assoc()) {
        $jobs[] = $row;
    }
}


?>
