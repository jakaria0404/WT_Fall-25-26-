<?php
session_start();

include "../db/db.php";

$success = "";
$error = "";

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? 'all';
$rank = $_GET['rank'] ?? 'all';

$sql = "SELECT * FROM users WHERE role = 'employee'";

$sql .= " ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$totalEmployees = mysqli_num_rows($result);

?>