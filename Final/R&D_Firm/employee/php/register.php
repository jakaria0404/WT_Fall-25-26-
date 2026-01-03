<!DOCTYPE html>
<html>
<head>
    <title>Registration with PHP Validation</title>
    <link rel="stylesheet" href="register.css"> </head>
<body>

<?php
$fullname = $username = $email = $password = $confirm_password = "";
$nameErr = $userErr = $emailErr = $passErr = $confPassErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["full_name"])) {
        $nameErr = "Full Name is required";
    } else {
        $fullname = test_input($_POST["full_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["username"])) {
        $userErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($_POST["confirm_password"])) {
        $confPassErr = "Please confirm your password";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        if ($password !== $confirm_password) {
            $confPassErr = "Passwords do not match";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    return $data;
}
?>

<div class="register-container">
    <form method="post" action="login.php">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label>Full Name</label>
        <input type="text" name="full_name" value="<?php echo $fullname;?>">
        <span class="error"><?php echo $nameErr;?></span>

        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username;?>"> 
        <span class="error"><?php echo $userErr;?></span>

        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error"><?php echo $emailErr;?></span>

        <label>Password</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passErr;?></span>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password">
        <span class="error"><?php echo $confPassErr;?></span>

        <button type="submit" name="submit" class="registerbtn">Register</button>
    </form>


</div>

</body>
</html>