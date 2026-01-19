<?php
session_start();
include "../db/db.php";
$success="";
$error="";

$first_name = $last_name = $username = $email = $password = $confirm_password = "";
$first_nameerr = $last_nameerr = $userErr = $emailErr = $passErr = $confPassErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["first_name"])) {
        $first_nameerr = "First Name is required";
    } else {
        $first_name = test_input($_POST["first_name"]);
    }

    if (empty($_POST["last_name"])) {
        $last_nameerr = "Last Name is required";
    } else {
        $last_name = test_input($_POST["last_name"]);
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
        if (strlen($password) < 6) {
            $passErr = "Password must be at least 6 characters long";
        }
    }

    if (empty($_POST["confirm_password"])) {
        $confPassErr = "Please confirm your password";
    } 
    else {
        $confirm_password = test_input($_POST["confirm_password"]);
        if ($password !== $confirm_password) {
            $confPassErr = "Passwords do not match";
        }
    }

    if(empty($first_nameerr) && empty($last_nameerr) && empty($userErr) && empty($emailErr) && empty($passErr) && empty($confPassErr)){
        $checkDuplicate = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
        $duplicateresult = mysqli_query($conn, $checkDuplicate);
        
        if($duplicateresult && mysqli_num_rows($duplicateresult) > 0){
            $error = "Username or email already exists";
        } 
        else {
            $year = date("y");
            $random=rand(0,999);
            $padded = str_pad($random,3,"0",STR_PAD_LEFT);
            $unique_id = "NK-".$padded."-".$year;
            $hassPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (unique_id,first_name, last_name, username, email, password,role) 
                    VALUES ('$unique_id','$first_name', '$last_name', '$username', '$email', '$hassPassword','user')";
            
            if(mysqli_query($conn, $sql)){
                header("Location: login.php");
                exit();
            } else {
                $error = "Database Error: " . mysqli_error($conn);
            }
        }
    }
}

function test_input($data) {
    $data = trim($data);
    return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>

<div class="register-container">
    <form method="post" action="">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo $first_name;?>">
        <span class="error"><?php echo $first_nameerr;?></span>

        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo $last_name;?>">
        <span class="error"><?php echo $last_nameerr;?></span>

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
        <p style="color:red;"><?php echo $error; ?></p>
        <a href="home.php" class="backbtn">Back to Home</a>
    </form>
</div>

</body>
</html>
