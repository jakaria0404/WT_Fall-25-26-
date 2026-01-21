<?php
include "auth.php";

$success = "";
$error = "";

if (isset($_GET['promote']) && isset($_GET['uid'])) {
    $uid = mysqli_real_escape_string($conn, $_GET['uid']);
    $rank = mysqli_real_escape_string($conn, $_GET['new_rank']);
    
    $sql = "UPDATE users SET rank = '$rank' WHERE unique_id = '$uid'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Employee promoted successfully!";
    }
    mysqli_query($conn, "UPDATE employees SET rank = '$rank' WHERE unique_id = '$uid'");
}
if (isset($_GET['remove']) && isset($_GET['uid'])) {
    $uid = mysqli_real_escape_string($conn, $_GET['uid']);
    
    $sql = "UPDATE users SET role = 'user' WHERE unique_id = '$uid'";
    
    if (mysqli_query($conn, $sql)) {
        $success = "Employee removed.";
    }
    mysqli_query($conn, "DELETE FROM employees WHERE unique_id = '$uid'");
}

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? 'all';
$rank = $_GET['rank'] ?? 'all';

$sql = "SELECT * FROM employees WHERE 1";

if ($search != '') { 
    $sql .= " AND (username LIKE '%$search%' OR unique_id LIKE '%$search%' OR name LIKE '%$search%' OR rank LIKE '%$search%')"; 
}

if ($category != 'all') { 
    $sql .= " AND category = '$category'"; 
}
if ($rank != 'all') { 
    $sql .= " AND rank = '$rank'"; 
}

$sql .= " ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$totalEmployees = mysqli_num_rows($result);

?>