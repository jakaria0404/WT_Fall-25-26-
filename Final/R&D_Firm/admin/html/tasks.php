<?php
include "../db/db.php"; 
$query = "SELECT username, unique_id, email, rank FROM users WHERE role = 'employee'";
$result = mysqli_query($conn, $query);

$employees = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Assignment - Admin</title>
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
    <link rel="stylesheet" href="../css/task_page/tasks.css">
    <link rel="stylesheet" href="../css/task_page/employee_search.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include "sidebar.php"; ?>
        <main class="main-content">
            <?php include "header.php"; ?>
            <div class="page-content">
            <h2>Assign Task</h2>
                                
            <form method="post" action="" class="task-form">
                <div class="form-group">
                    <label>Task Title:</label>
                    <input type="text" name="title" value="" required>
                </div>
                
                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label>Assign To:</label>
                    <?php include "../php/employee_search.php"; ?>
                </div>
                <div class="form-group">
                    <label>Deadline (Optional):</label>
                    <input type="date" name="deadline">
                </div>
                
                <button type="submit" class="submit-btn">Assign Task</button>
            </form>
            
</body>
</html>
