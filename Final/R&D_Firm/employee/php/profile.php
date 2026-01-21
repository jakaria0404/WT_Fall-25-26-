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
    } elseif($_SESSION['role'] == 'admin'){
        header("Location: ../../admin/html/dashboard.php");
    }
    exit();
}
if (isset($_GET['ajax'])) {
    $currentUser = $_SESSION['username'];
    $new_fname = $_POST['first_name'];
    $new_lname = $_POST['last_name'];
    $new_email = $_POST['email'];
    $new_username = $_POST['username'];

    $sql = "UPDATE users SET first_name = '$new_fname', last_name = '$new_lname', email = '$new_email', username ='$new_username' WHERE username = '$currentUser'";
    
    if(mysqli_query($conn, $sql)){
        $_SESSION['username'] = $new_username;
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile.";
    }
    exit();
}

$currentUser = $_SESSION['username'];
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
            <li><a href="home.php">Home</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>

    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php" style="background-color: #388e3c;">Profile</a>
        <a href="myjob.php">My Job Application</a>
        <a href="task.php">Tasks</a>
    </div>

    <h2 class="profile">Welcome <span id="display_name"><?php echo $user['username'];?></span></h2>

    <div class="profile">
        <h2>Update Profile</h2>
        <p id="msg" style="text-align:center; font-weight: bold;"></p>

        <form id="profileForm">
            <div class="group">
                <label>First Name</label><br>
                <input type="text" name="first_name" id="fname" value="<?php echo $user['first_name'] ?? ''?>"> 
            </div>
            <div class="group">
                <label>Last Name</label><br>
                <input type="text" name="last_name" id="lname" value="<?php echo $user['last_name'] ?? ''?>"> 
            </div>
            <div class="group">
                <label>Username</label><br>
                <input type="text" name="username" id="uname" value="<?php echo $user['username'] ?? ''?>"> 
            </div>
            <div class="group">
                <label>Email</label><br>
                <input type="email" name="email" id="email" value="<?php echo $user['email'] ?? ''?>"> <br><br>
            </div>
            <button type="button" onclick="updateProfile()" class="btn">Save Changes</button>
        </form>
    </div>

    <script src="../js/ajax_profile.js"></script>
</body>
</html>