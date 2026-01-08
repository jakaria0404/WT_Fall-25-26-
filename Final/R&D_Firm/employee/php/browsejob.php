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
        <link rel="stylesheet" href="../css/browsejob.css">
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
        <div class = "job-section">
            <h1 class = "job-title"></h1>
            <div class = "job_grid">
                <?php
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result))
                    {
                ?>
                <div class = "job_part">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><b>Description:</b><br><?php echo $row['description']; ?></p>
                    <p><b>Requirement:</b><br> <?php echo $row['requirement']; ?></p>
                    <a href="apply.php?id=<?php echo $row['id']; ?>" class="apply_btn">Apply Now</a>
                </div>
                <?php 
                    }
                }
                else {
                    echo "NO job found";
                }
                ?>
                
            </div>
        </div>
        <a href = "logout.php" class="logout_btn">Logout</a>
    </body>
</html>