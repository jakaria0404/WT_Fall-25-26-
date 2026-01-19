<?php
function test_input($data) {
    $data = trim($data);
    return $data;
}

$name_err = $email_err = $msg_err = "";
$success_msg = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = test_input($_POST['name']);
    $email   = test_input($_POST['email']);
    $message = test_input($_POST['message']);

    if (empty($name)) {
        $name_err = "Name is required";
    }

    if (empty($email)) {
        $email_err = "Email is required";
    }

    if (empty($message)) {
        $msg_err = "Message is required";
    }

    if (empty($name_err) && empty($email_err) && empty($msg_err)) {
        $success_msg = "Your message has been sent!";
        $name = $email = $message = "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/contact.css">
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
                <input type="text" name="text">
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
            </div>
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
</body>
</html>