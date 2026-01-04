<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
}
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
                <li><a>Browse a job</a></li>
                <li><a>Copntacy Us</a></li>
            </ul>
        </nav>
        <h2>hello</h2>
        <a href = "logout.php" class="logout_btn">Logout</a>
    </body>
</html>