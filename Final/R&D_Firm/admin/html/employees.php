<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees Admin</title>
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
    <link rel="stylesheet" href="../css/employee_page/employees.css">
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
</head>
<body>

<div class="dashboard-container">
    <?php include "sidebar.php"; ?>

    <main class="main-content">
        <?php include "header.php"; ?>

        <div class="page-content">
            <h2>Employee Management</h2>

         <div class="filter-box">
                <form method="GET">
                    <div class="search-group">
                        <label>Search:</label>
                        <input type="text" name="search"><button type="submit" class="btn-search">Search</button>
                    </div>