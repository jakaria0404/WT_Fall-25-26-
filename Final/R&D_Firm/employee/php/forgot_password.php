<?php
session_start();
include "../db/db.php"; 

$msg = ""; 
$step = 1;

if (isset($_POST['check'])) {
    $user = $_POST['user']; 

    if (empty($user)) {
        $msg = "Please enter your username!";
    } else {
        $sql = "SELECT username FROM users WHERE username = '$user'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            $_SESSION['reset_user'] = $user; 
            $step = 2; 
        } else {
            $msg = "Username not found!";
        }
    }
}

if (isset($_POST['update'])) {
    $p1 = $_POST['p1']; 
    $p2 = $_POST['p2']; 
    $user = $_SESSION['reset_user'];

    if (empty($p1) || empty($p2)) {
        $msg = "Please fill both fields!";
        $step = 2;
    } elseif (strlen($p1) < 6) {
        $msg = "Password must be at least 6 characters!";
        $step = 2;
    } elseif ($p1 != $p2) {
        $msg = "Passwords do not match!";
        $step = 2;
    } else {
        $hash = password_hash($p1, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$hash' WHERE username = '$user'";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

    <h2>Reset Password</h2>
    <p style="color:red;"><?php echo $msg; ?></p>

    <?php if ($step == 1) { ?>
        <form method="post">
            <p>Enter Username:</p>
            <input type="text" name="user"> 
            <input type="submit" name="check" value="Next">
        </form>
    <?php } else { ?>
        <form method="post">
            <p>New Password:</p>
            <input type="password" name="p1">
            <p>Confirm Password:</p>
            <input type="password" name="p2">
            <br><br>
            <input type="submit" name="update" value="Update Password">
        </form>
    <?php } ?>

</body>
</html>