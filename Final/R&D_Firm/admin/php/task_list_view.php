<div>
    <h3>Assigned Tasks List</h3>

    <table>
        <thead>
            <tr>
                <th>Task Title</th>
                <th>Assigned To</th>
                <th>Assigned By</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Actions</th>
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
                    $status = str_replace('_', ' ', $task['status']);
                    $emp_name = $task['emp_name'] ?? 'Unknown';
                    $deadline = $task['deadline'] ? date('d M, Y', strtotime($task['deadline'])) : '--';
            ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($task['title']); ?></strong>
                            <div><?= htmlspecialchars(substr($task['description'], 0, 40)) . '...'; ?></div>
                        </td>
                        <td>
                            <span><?= htmlspecialchars($emp_name); ?></span>
                            <div><?= htmlspecialchars($task['employee_id']); ?></div>
                        </td>
                        <td><?= htmlspecialchars($task['assigned_by']); ?></td>
                        <td><?= htmlspecialchars($status); ?></td>
                        <td><?= htmlspecialchars($deadline); ?></td>
                        <td>
                            <a href="edit_task.php?id=<?= $task['id']; ?>">Edit</a>
                            <a href="../php/delete_task.php?id=<?= $task['id']; ?>" onclick="return confirm('Delete this task?')">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'>No tasks found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
