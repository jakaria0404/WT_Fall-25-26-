<?php
session_start();

include_once "../db/db.php";

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../employee/php/login.php");
    exit();
}

if (!isset($_SESSION['user_id']) || !isset($_SESSION['unique_id'])) {
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $userQuery = mysqli_query($conn, "SELECT id, unique_id FROM users WHERE username = '$username' LIMIT 1");

    if ($userQuery && mysqli_num_rows($userQuery) > 0) {
        $userRow = mysqli_fetch_assoc($userQuery);
        $_SESSION['user_id'] = $userRow['id'];
        $_SESSION['unique_id'] = $userRow['unique_id'];
    }
}
?>
