<?php
session_start();
include "../db/db.php";

$success = "";
$error = "";
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, trim($_POST["first_name"] ?? ""));
    $lname = mysqli_real_escape_string($conn, trim($_POST["last_name"] ?? ""));
    $email = mysqli_real_escape_string($conn, trim($_POST["email"] ?? ""));
    $oldPass = $_POST["current_password"] ?? "";
    $newPass = $_POST["new_password"] ?? "";
    
    if (empty($fname) || empty($lname) || empty($email)) {
        $error = "All fields are required!";
    } else {
        if (!empty($newPass)) {
            $checkSql = "SELECT password FROM users WHERE id = '$user_id'";
            $result = mysqli_query($conn, $checkSql);
            $userCheck = mysqli_fetch_assoc($result);
            
            if (!password_verify($oldPass, $userCheck['password'])) {
                $error = "Current password is incorrect!";
            } else {
                $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email', password='$hashedPass' WHERE id='$user_id'";
            }
        } else {
            $sql = "UPDATE users SET first_name='$fname', last_name='$lname', email='$email' WHERE id='$user_id'";
        }
        
        if (empty($error) && isset($sql)) {
            if (mysqli_query($conn, $sql)) {
                $success = "Profile updated successfully!";
                $_SESSION['first_name'] = $fname;
                $_SESSION['last_name'] = $lname;
                $_SESSION['email'] = $email;
            } else {
                $error = "Update failed: " . mysqli_error($conn);
            }
        }
    }
}

$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>