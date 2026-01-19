<?php
session_start();

include "../db/db.php";

$success = "";
$error = "";

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? 'all';
$rank = $_GET['rank'] ?? 'all';

?>