<?php
session_start();
include "../db/db.php";

if(isset($_SESSION["username"])){
    if($_SESSION['role']=='admin'){
        header("Location: ../../admin/html/dashboard.php");
    } elseif($_SESSION['role']=='user'){
        header("Location: userprofile.php");
    } else{
        header("Location: profile.php");
    }
    exit();
}
$error = "";
$username="";
$usererror="";
$passerror="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username)){
        $usererror = "Username is required";
    }
    
    if(empty($password)){
        $passerror = "password is required";
    }

    if(empty($usererror) && empty($passerror)){

        $sql = "SELECT * FROM USERS WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['unique_id'] = $row['unique_id'];

                setcookie("user_login", $row['username'], time() + (86400 * 30), "/");

                if($_SESSION['role']=='admin'){
                    header("Location: ../../admin/html/dashboard.php");
                    exit();
                } else if($_SESSION['role']=='user'){
                    header("Location: userprofile.php");
                    exit();
                } else if($_SESSION['role']=='employee'){
                    header("Location: profile.php");
                    exit();
                }
            }
            else{
                $error = "Invalid password";
            }
        }
        else{
            $error = "No user found with that username";
        }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>

<div class="login-container">
    <h1>Login</h1>
   <?php
    if ($error) {
    echo '<p class="error" style="text-align: center;">' . $error . '</p>';
}
?>

    <form method="post" action="">
        
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $username;?>">
        <span class="error"><?php echo $usererror; ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passerror; ?></span>

        <div style="text-align: right; margin-bottom: 15px;">
            <a href="forgot_password.php" style="text-decoration: none; font-size: 14px; color: #007bff;">Forgot Password?</a>
        </div>

        <input type="submit" name="submit" value="Login" class="loginbtn">
        <div class="new"> 
        <p>New here?</p>
        <a href="register.php" class="create-btn">Create New Account</a>
        </div>
    </form>
</div>


</body>
</html>