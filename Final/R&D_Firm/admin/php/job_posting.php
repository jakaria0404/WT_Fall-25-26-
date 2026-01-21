<?php
include "auth.php";
function test_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}

$success = "";
$error = "";
$title = "";
$description = "";
$requirements = "";
$type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, trim($_POST["title"]));
    $description = mysqli_real_escape_string($conn, trim($_POST["description"]));
    $requirements = mysqli_real_escape_string($conn, trim($_POST["requirements"] ?? ""));
    $type = mysqli_real_escape_string($conn, trim($_POST["type"]));

    if (empty($title) || empty($description) || empty($type)) {
        $error = "All fields are required";
    } else {
        $sql = "INSERT INTO job_posts (title, description, requirements, type) 
                VALUES ('$title', '$description', '$requirements', '$type')";
        
        if (mysqli_query($conn, $sql)) {
            $success = "Job posted successfully";
            $title = $description = $requirements = $type = "";
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_GET['delete'], $_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    if (mysqli_query($conn, "DELETE FROM job_posts WHERE job_id = '$id'")) {
         header("Location:../html/job_posting.php?deleted=1");
        exit();
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

$deleted = isset($_GET['deleted']);
?>