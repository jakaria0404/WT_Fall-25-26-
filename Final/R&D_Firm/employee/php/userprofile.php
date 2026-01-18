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
            <li><a href="browsejob.php">Browse job</a></li>
            <li><a href="profile.php">Profile</a></li>

        </ul>
    </nav>

    <div class="sidebar">
        <a href="profile.php" style="background-color: #388e3c;">Profile</a>
        <a href="myjob.php">My Job Application</a>
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