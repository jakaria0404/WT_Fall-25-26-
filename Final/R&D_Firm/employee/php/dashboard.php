<?php
session_start();
include "../db/db.php";
if(!isset($_SESSION["username"])){
    header("Location: login.php");   
    exit();
}
$sql = "SELECT id, title ,description ,requirement, type FROM create_job";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Browse job</title>
        <link rel="stylesheet" href="../css/dashboard.css">
    </head>
    <body>
         <nav class = "navbar">
            <h2>NilKham</h2>
            <ul class = "container">
                <li><a>Home</a></li>
                <li><a>About Us</a></li>
                <li><a>Our services</a></li>
                <li><a href = "browsejob.php">Browse job</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </nav>
        <a href = "logout.php" class="logout_btn">Logout</a>
    </body>
</html>