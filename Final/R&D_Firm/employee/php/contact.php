<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
        <nav class = "navbar">
            <h2>NilKham</h2>
            <ul class = "container">
                <li><a href = "home.php">Home</a></li>
                <li><a>About Us</a></li>
                <li><a>Our services</a></li>
                <li><a href = "browsejob.php">Browse job</a></li>
                <li><a href = "contact.php">Contact Us</a></li>
            </ul>
        </nav>
        <div class="form">
        <h2>Contact Us</h2>
        <form action="" method="POST">
            <div class="label">
                <label>Name</label>
                <input type="text" name="name">
            </div>
            <div class="label">
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div class="label">
                <label>Message</label>
                <textarea name="message" roes="5"></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-section">
                    <h3>Location</h3>
                    <p>123 Innovation Street<br>Tech City, Banani<br>Bangladesh</p>
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
</div>
</body>
</html>