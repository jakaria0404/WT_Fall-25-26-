<?php
session_start();
include "../db/db.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $user = $_SESSION['username'];
    $portfolio = $_POST['portfolio_link'];

    $userQuery = "SELECT user_id FROM users WHERE username = '$user'";
    $userResult = mysqli_query($conn, $userQuery);
    $userData = mysqli_fetch_assoc($userResult);
    $userId = $userData['user_id'];

    $jobId = isset($_GET['id']) ? $_GET['id'] : 1; 

    $cvName = $_FILES['cv_file']['name'];
    $fileTemp = $_FILES['cv_file']['tmp_name'];
    $folder = "../uploads/" . $cvName;

    if (move_uploaded_file($fileTemp, $folder)) {
        $sql = "INSERT INTO job_applications (user_id, job_id, cv_link, portfolio_link, status, phase) 
                VALUES ('$userId', '$jobId', '$folder', '$portfolio', 'pending', 'cv')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: browsejob.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply Job</title>
    <link rel="stylesheet" href="../css/apply.css">
</head>
<body>

<div class="apply-container">
    <form method="post" enctype="multipart/form-data">
        <h2>Apply for Job</h2>
        
        <label>Upload Your CV</label>
        <input type="file" name="cv_file" required>
        
        <label>Portfolio Link</label>
        <input type="url" name="portfolio_link">

        <button type="submit" name="submit" class="submitbtn">Submit</button>
        <a href="browsejob.php" class="backbtn">Cancel</a>
    </form>
</div>

</body>
</html>
