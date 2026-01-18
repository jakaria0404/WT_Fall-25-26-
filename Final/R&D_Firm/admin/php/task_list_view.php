<link rel="stylesheet" href="../css/task_page/task_list_view.css">
<div class="task-list-container">
    <h3 class="task-list-title">Assigned Tasks List</h3>
    <table class="task-table">
        <thead>
            <tr>
                <th>Task Title</th>
                <th>Assigned To</th>
                <th>Assigned By</th>
                <th>Status</th>
                <th>Deadline</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT t.*, u.username AS emp_name 
                    FROM tasks t 
                    LEFT JOIN users u ON t.employee_id = u.unique_id 
                    ORDER BY t.id DESC";
            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {
                while ($task = mysqli_fetch_assoc($res)) {
                    $status_color = '#6c757d'; 
                    $text_color = '#fff';
                    if ($task['status'] == 'pending') {
                        $status_color = '#ffc107'; $text_color = '#000';
                    } elseif ($task['status'] == 'in_progress') {
                        $status_color = '#17a2b8';
                    } elseif ($task['status'] == 'completed') {
                        $status_color = '#28a745';
                    }
                    ?>
                    <tr>
                        <td>
                            <strong class="task-title"><?= htmlspecialchars($task['title']); ?></strong>
                            <div class="task-desc">
                                <?= htmlspecialchars(substr($task['description'], 0, 40)) . '...'; ?>
                            </div>
                        </td>
                        <td>
                            <span class="emp-name"><?= htmlspecialchars($task['emp_name'] ?? 'Unknown'); ?></span>
                            <div class="emp-id"><?= htmlspecialchars($task['employee_id']); ?></div>
                        </td>
                        <td class="assigned-by">
                            <?= htmlspecialchars($task['assigned_by']); ?>
                        </td>
                        <td>
                            <span class="status-badge" style="background-color: <?= $status_color; ?>; color: <?= $text_color; ?>;">
                                <?= str_replace('_', ' ', $task['status']); ?>
                            </span>
                        </td>
                        <td class="deadline-text">
                            <?= $task['deadline'] ? date('d M, Y', strtotime($task['deadline'])) : '<span class="no-deadline">--</span>'; ?>
                        </td>
                        <td class="action-cell">
                            <a href="edit_task.php?id=<?= $task['id']; ?>" class="action-btn btn-edit">Edit</a>
                            <a href="../php/delete_task.php?id=<?= $task['id']; ?>" onclick="return confirm('Delete this task?')" class="action-btn btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php } 
            } else {
                echo "<tr><td colspan='6' class='no-data'>No tasks found.</td></tr>";
            } ?>
        </tbody>
    </table>
</div>