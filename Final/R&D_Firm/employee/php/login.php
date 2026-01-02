<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<?php
$username = "";
$usererror = "";
$passerror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $usererror = "Username is req";
    } else {
        $username = test_input($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passerror = "Password is req";
    }
}

function test_input($data) {
    $data = trim($data);
    return $data;
}
?>

<div class="login-container">
    <h1>Login</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $username;?>">
        <span class="error"><?php echo $usererror; ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passerror; ?></span>

        <input type="submit" name="submit" value="Login" class="loginbtn">
        
        <div class="footer-links">
            <p>New here?</p>
            <a href="register.php" class="create-btn">Create New Account</a>
        </div>
    </form>
</div>


</body>
</html>