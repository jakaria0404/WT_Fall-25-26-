<?php
session_start();
include "../db/db.php";

$messages = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages</title>
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
    <link rel="stylesheet" href="../css/contact_page/contact_messages.css">
</head>
<body>
<div class="dashboard-container">
    <?php include "sidebar.php"; ?>
    <main class="main-content">
        <?php include "header.php"; ?>
        <div class="page-content">
            <h3>Contact Messages</h3>

             <table class="messages-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                   </thead>
                <tbody>
                    <?php if ($messages && mysqli_num_rows($messages) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($messages)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="empty-row">No messages found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
