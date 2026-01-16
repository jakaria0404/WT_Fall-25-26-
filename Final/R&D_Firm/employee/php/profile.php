<?php
session_start();
include "../db/db.php";
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
$currentUser = $_SESSION['username'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];
    $new_username = $_POST['username'];
    $sql = "UPDATE users SET full_name = '$new_name', email = '$new_email', username ='$new_username'WHERE username = '$currentUser'";
    if(mysqli_query($conn,$sql)){
        if($new_username != $currentUser){
            $_SESSION['username']=$new_username;
        }
        echo "success";
    }
    else{
        echo "error";
    }
    exit();
}
$query = "SELECT * FROM users WHERE username = '$currentUser'";
$result = mysqli_query($conn,$query);
$user = mysqli_fetch_assoc($result);
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
                <li><a href = "browsejob.php">Browse job</a></li>
                <li><a href = "profile.php">Profile</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </nav>
       
        <div class = "profile">
            <h2>Update Profile</h2>
            <form method = "POST">
                <div class = "group">
                    <label>Full Name</label>
                    <input type = "text" name = "name" value="<?php echo $user['full_name'] ?? ''?>"> 
                </div>
                 <div class = "group">
                    <label>Username</label>
                    <input type = "text" name = "username" value="<?php echo $user['username'] ?? ''?>"> 
                </div>
                <div class = "group">
                    <label>Email</label>
                    <input type = "email" name = "email" value="<?php echo $user['email'] ?? ''?>"> 
                </div>
                <button type ="submit" class="btn">Save Changes</button>
            
            </form>
        </div>
    </body>
</html>