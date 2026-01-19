<?php
session_start();
include "../db/db.php";

$message = isset($_GET['msg']) ? $_GET['msg'] : "";

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
    <link rel="stylesheet" href="../css/user_management_page/user_management.css">
</head>
<body>

<div class="dashboard-container">
    <?php include "sidebar.php"; ?>

    <main class="main-content">
        <?php include "header.php"; ?>

        <div class="page-content">
            <h3>User Management</h3>

            <?php if ($message != ""): ?>
                <div class="msg"><?php echo $message; ?></div>
            <?php endif; ?>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <select onchange="window.location.href='?id=<?php echo $row['id']; ?>&change_role='+this.value">
                                    <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User</option>
                                    <option value="employee" <?php if ($row['role'] == 'employee') echo 'selected'; ?>>Employee</option>
                                    <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                </select>
                            </td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <?php if ($row['id'] == ($_SESSION['user_id'] ?? 0)): ?>
                                    <span class="tag-you">You</span>
                                <?php elseif ($row['role'] == 'admin'): ?>
                                    <span class="tag-admin">Admin</span>
                                <?php else: ?>
                                    <a href="?delete_id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

</body>
</html>