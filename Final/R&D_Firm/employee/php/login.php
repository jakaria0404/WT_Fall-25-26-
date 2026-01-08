<?php
session_start();
include "../db/db.php";

if(isset($_SESSION["username"])){
    header("Location: dashboard.php");
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
                header("Location: dashboard.php");
                exit();
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
    <meta name="viewport" 
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