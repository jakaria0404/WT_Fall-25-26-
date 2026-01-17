<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Assignment - Admin</title>
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
    <link rel="stylesheet" href="../css/task_page/tasks.css">
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
        
                        <input type="text" id="employeeSearch" placeholder="Search by Employee ID (NK-XXX-YY)...">
                <div class="form-group">
                    <label>Deadline (Optional):</label>
                    <input type="date" name="deadline">
                </div>
                
                <button type="submit" class="submit-btn">Assign Task</button>
            </form>
            
</body>
</html>
