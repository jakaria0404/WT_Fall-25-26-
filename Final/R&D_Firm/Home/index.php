<?php
session_start();
include "../db/db.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Browse job</title>
        <link rel="stylesheet" href="../css/Home.css">
    </head>
    <body>
         <nav class = "navbar">
            <h2>NilKham</h2>
            <ul class = "container">
                <li><a>Home</a></li>
                <li><a>About Us</a></li>
                <li><a>Our services</a></li>
                <li><a href = "browsejob.php">Browse job</a></li>
                <li><a href = "profile.php">Profile</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </nav>
        <div class="hero-content">
            <h1><span style="color: #4CAF50;">IMAGINATION</span> IS MORE IMPORTANT THAN KNOWLEDGE</h1>
            <p>Together we the people achieve more than any single person could ever do alone.</p>
        </div>
        <a href = "/auth/login.php" class="get_started">Get Started</a>

        <footer class="footer">
            <div class="footer-container">
                <div class="footer-section">
                    <h3>Location</h3>
                    <p>123 Innovation Street<br>Tech City, TC 12345<br>Country</p>
                </div>
                <div class="footer-section">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a class="social-icon">Instagram</a>
                        <a class="social-icon">Facebook</a>
                        <a class="social-icon">Twitter</a>
                        <a class="social-icon">LinkedIn</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>