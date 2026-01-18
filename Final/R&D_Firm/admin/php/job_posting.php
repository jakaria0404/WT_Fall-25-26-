<?php
include "../db/db.php";
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['edit_job'])) {
    $title = test_input($_POST["title"], $conn);
    $description = test_input($_POST["description"], $conn);
    $requirements = test_input($_POST["requirements"] ?? "", $conn);
    $type = test_input($_POST["type"], $conn);

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

if (isset($_GET['delete']) && isset($_GET['id'])) {
    $jobId = $_GET['id'];
    $sql = "DELETE FROM job_posts WHERE job_id = $jobId";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: job_posting.php?deleted=1");
        exit;
    } else {
        $error = "Error: " . mysqli_error($conn);
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