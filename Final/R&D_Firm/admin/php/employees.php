<?php
session_start();

include "../db/db.php";

$success = "";
$error = "";

if (isset($_GET['promote']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $rank = mysqli_real_escape_string($conn, $_GET['new_rank']);
    
    $sql = "UPDATE users SET rank = '$rank' WHERE id = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Employee promoted successfully!";
    }
}
if (isset($_GET['remove']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $sql = "UPDATE users SET role = 'user' WHERE id = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Employee removed.";
    }
}

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? 'all';
$rank = $_GET['rank'] ?? 'all';

$sql = "SELECT * FROM users WHERE role = 'employee'";

$sql .= " ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$totalEmployees = mysqli_num_rows($result);

?>