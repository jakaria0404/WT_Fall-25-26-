<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Admin</title>
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
    <link rel="stylesheet" href="../css/dashboard_page/profile.css">
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include "sidebar.php"; ?>
        <main class="main-content">
            <?php include "header.php"; ?>
            <div class="page-content">
            <h2>My Profile</h2>
            
            
            
            <div class="profile-container">
                <div class="profile-info">
                    <h2>Profile Information</h2>
                    <form method="post" action="" class="profile-form">
                        <div class="form-group">
                            <label>User ID:</label>
                            <input type="text" value="<?php echo htmlspecialchars($user['unique_id'] ?? 'N/A'); ?>" disabled>
                            <small>Your unique ID (cannot be changed)</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>
                            <small>Username cannot be changed</small>
                        </div>
                        
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name'] ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                        
                        <h3>Change Password</h3>
                        <div class="form-group">
                            <label>Current Password:</label>
                            <input type="password" name="current_password">
                            <small>Leave blank if not changing password</small>
                        </div>
                        
                        <div class="form-group">
                            <label>New Password:</label>
                            <input type="password" name="new_password">
                            <small>Leave blank if not changing password</small>
                        </div>
                        
                        <button type="submit" class="submit-btn">Update Profile</button>
                    </form>
                </div>
            </div>
            </div>
        </main>
    </div>
</body>
</html>