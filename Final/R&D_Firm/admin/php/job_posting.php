<?php
include "../db/db.php";

$success = "";
$error = "";
$title = "";
$description = "";
$requirements = "";
$type = "";



if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['edit_job'])) {
    $title = test_input($_POST["title"]);
    $description = test_input($_POST["description"]);
    $requirements = test_input($_POST["requirements"] ?? "");
    $type = test_input($_POST["type"]);

    if (empty($title) || empty($description) || empty($type)) {
        $error = "All fields are required";
    } else {
        $sql = "INSERT INTO job_posts (title, description, requirements, type) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $requirements, $type);
        
        if (mysqli_stmt_execute($stmt)) {
            $success = "Job posted successfully";
            $title = "";
            $description = "";
            $requirements = "";
            $type = "";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}


$jobsSql = "SELECT * FROM job_posts ORDER BY created_at DESC";
$jobsResult = mysqli_query($conn, $jobsSql);
$jobs = [];
if ($jobsResult && mysqli_num_rows($jobsResult) > 0) {
    while ($row = mysqli_fetch_assoc($jobsResult)) {
        $jobs[] = $row;
    }
}
?>
