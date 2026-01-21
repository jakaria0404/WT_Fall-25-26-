<?php
include "auth.php";

$user_id = $_SESSION['user_id'];

if (isset($_GET['ajax'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $oldPass = $_POST['current_password'];
    $newPass = $_POST['new_password'];
    
    if (!empty($newPass)) {
        $checkSql = "SELECT password FROM users WHERE id = '$user_id'";
        $result = mysqli_query($conn, $checkSql);
        $userCheck = mysqli_fetch_assoc($result);
        
        if (!password_verify($oldPass, $userCheck['password'])) {
            echo "Error: Current password is incorrect!";
        } else {
            $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email', password='$hashedPass' WHERE id='$user_id'";
            
            if(mysqli_query($conn, $sql)){
                $_SESSION['first_name'] = $fname;
                $_SESSION['last_name'] = $lname;
                $_SESSION['email'] = $email;
                echo "Profile updated successfully!";
            } else {
                echo "Error updating profile.";
            }
        }
    } else {
        $sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email' WHERE id='$user_id'";
        
        if(mysqli_query($conn, $sql)){
            $_SESSION['first_name'] = $fname;
            $_SESSION['last_name'] = $lname;
            $_SESSION['email'] = $email;
            echo "Profile updated successfully!";
        } else {
            echo "Error updating profile.";
        }
    }
    exit();
}

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>