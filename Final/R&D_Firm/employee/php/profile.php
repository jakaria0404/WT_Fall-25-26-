<?php
session_start();
include "../db/db.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
if($_SESSION['role'] !== 'employee'){
    if($_SESSION['role'] == 'user'){
        header("Location: userprofile.php");
    }
    exit();
}

$currentUser = $_SESSION['username'];
$msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $new_fname = $_POST['first_name'];
    $new_lname = $_POST['last_name'];
    $new_email = $_POST['email'];
    $new_username = $_POST['username'];

    $sql = "UPDATE users SET first_name = '$new_fname', last_name = '$new_lname', email = '$new_email', username ='$new_username' WHERE username = '$currentUser'";
    
    if(mysqli_query($conn, $sql)){
        $_SESSION['username'] = $new_username;
        $currentUser = $new_username;
        $msg = "Profile updated successfully!";
    } else {
        $msg = "Error updating profile.";
    }
}

$query = "SELECT * FROM users WHERE username = '$currentUser'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <nav class="navbar">
        <h2>NilKham</h2>
        <ul class="container">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="logout.php">Log Out</a></li>

        </ul>
    </nav>

    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php" style="background-color: #388e3c;">Profile</a>
        <a href="myjob.php">My Job Application</a>
        <a href="task.php">Tasks</a>
    </div>
    <h2 class ="profile">Welcome <?php echo $_SESSION['username'];?></h2>

    <div class="profile">
        <h2>Update Profile</h2>
        
        <?php if($msg != ""): ?>
            <p style="color: green; text-align:center; font-weight: bold;"><?php echo $msg; ?></p>
        <?php endif; ?>

        <form method="POST">
            <div class="group">
                <label>First Name</label><br>
                <input type="text" name="first_name" value="<?php echo $user['first_name'] ?? ''?>"> 
            </div>
            <div class="group">
                <label>Last Name</label><br>
                <input type="text" name="last_name" value="<?php echo $user['last_name'] ?? ''?>"> 
            </div>
            <div class="group">
                <label>Username</label><br>
                <input type="text" name="username" value="<?php echo $user['username'] ?? ''?>"> 
            </div>
            <div class="group">
                <label>Email</label><br>
                <input type="email" name="email" value="<?php echo $user['email'] ?? ''?>"> <br><br>
            </div>
            <button type="submit" class="btn">Save Changes</button>
        </form>
    </div>
</body>
</html>