<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Apply job</title>
        <link rel = "stylesheet" href = ../css/apply.css>

    </head>
    <body>
        <div class="apply-container">
            <form method="post" enctype="multipart/form-data">
                <h2>Apply for Job</h2>
                <p>Upload your cv and protfolio link</p>
                <label>Upload Your CV</label>
                <input type = "file" class = "cv" name = "cv_file">
                <label>Upload Your Protfolio link</label>
                <input type = "url" class = "protfolio" name = "protfolio_link">

                <button type= "submit" name = "submit" class = "submitbtn">Submit</button>
                <a href="browsejob.php" class="backbtn">Cancel</a>



            </form>
        </div>
    </body>
</html>