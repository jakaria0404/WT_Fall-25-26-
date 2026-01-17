<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Admin</title>
   <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
    <link rel="stylesheet" href="../css/user_management_page/user_management.css">
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include "sidebar.php"; ?>
        <main class="main-content">
            <?php include "header.php"; ?>
            <div class="page-content">
            <h2>User Management</h2>

            
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
            </table>
            </div>
        </main>
    </div>
   
</body>
</html>
