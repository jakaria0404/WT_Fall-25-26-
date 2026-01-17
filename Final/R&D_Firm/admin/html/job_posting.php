<?php include "../php/job_posting.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting - Admin</title>
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
    <link rel="stylesheet" href="../css/job_posting_page/job_posting.css">

    </head>
<body>
    <div class="dashboard-container">
        <?php include "sidebar.php"; ?>
        <main class="main-content">
            <?php include "header.php"; ?>
        <div class="page-content">
            <h2>Post a Job</h2>

            <form method="post" action="" class="job-form">
                <div class="form-group">
            <label>Job Title:</label>
                    <input type="text" name="title" required>
                </div>
                
                <div class="form-group">
                    <label>Job Type:</label>
                    <select name="type" required>
                        <option value="">Select Type</option>
                        <option value="developer">Developer</option>
                        <option value="researcher"> Researcher</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description" rows="5" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Requirements:</label>
                    <textarea name="requirements" rows="5"></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Post Job</button>
            </form>

        <h3>Posted Jobs</h3>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Created</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($jobs) > 0): ?>
                        <?php foreach ($jobs as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['title']); ?></td>
                                <td><?php echo ucfirst($row['type']); ?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['created_at'])); ?></td>
                                <td>R&D Firm Author</td>
                                <td>
                                    <a href="?edit=<?php echo $row['job_id']; ?>" class="edit-link">Edit</a> |
                                    <a href="?delete=1&id=<?php echo $row['job_id']; ?>" onclick="return confirm('Are you sure?')" class="delete-link">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5">No jobs posted yet</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

      </div>
        </main>
    </div>
</body>
</html>

