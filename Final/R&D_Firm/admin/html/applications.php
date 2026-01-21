<?php include "../php/applications.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications - Admin</title>

    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/applications_page/applications.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include "sidebar.php"; ?>
        <main class="main-content">
            <?php include "header.php"; ?>
                
            <div class="container">
                <h2>Job Applications</h2>
                <div class="filter-box">
                    <div class="btn-group">
                        <a href="?status=<?= htmlspecialchars($statusFilter) ?>&type=all" 
                           class="btn <?= $typeFilter=='all'?'active':'' ?>">All</a>
                        <a href="?status=<?= htmlspecialchars($statusFilter) ?>&type=developer" 
                           class="btn <?= $typeFilter=='developer'?'active':'' ?>">Developer</a>
                        <a href="?status=<?= htmlspecialchars($statusFilter) ?>&type=researcher" 
                           class="btn <?= $typeFilter=='researcher'?'active':'' ?>">Researcher</a>
                    </div>

                    <form method="get" class="search-form">
                        <input type="hidden" name="status" value="<?= htmlspecialchars($statusFilter) ?>">
                        <input type="hidden" name="type" value="<?= htmlspecialchars($typeFilter) ?>">
                        <input type="text" name="search" placeholder="Search by name/ID..."
                               value="<?= htmlspecialchars($search) ?>">

                        <button type="submit">Search</button>
                    </form>
                    <a href="applications.php" class="reset-link">Reset</a>
                </div>

                <div class="tabs">
                    <a href="?status=pending&type=<?= htmlspecialchars($typeFilter) ?>" 
                       class="<?= $statusFilter=='pending'?'active':'' ?>">Pending</a>
                    <a href="?status=interview_selected&type=<?= htmlspecialchars($typeFilter) ?>" 
                       class="<?= $statusFilter=='interview_selected'?'active':'' ?>">Interview</a>
                    <a href="?status=passed&type=<?= htmlspecialchars($typeFilter) ?>" 
                       class="<?= $statusFilter=='passed'?'active':'' ?>">Passed</a>
                    <a href="?status=rejected&type=<?= htmlspecialchars($typeFilter) ?>" 
                       class="<?= $statusFilter=='rejected'?'active':'' ?>">Rejected</a>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Applicant</th>
                            <th>Job Title</th>
                            <th>CV</th>
                            <th>Porfolio Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if($totalApplications > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['unique_id']) ?></td>
                            <td>
                                <?= htmlspecialchars($row['username']) ?><br>
                                <small><?= htmlspecialchars($row['email']) ?></small>
                            </td>
                            <td><?= htmlspecialchars($row['job_title']) ?></td>
                            <td>
                                <?php if(!empty($row['cv_link'])): ?>
                                    <a href="download_cv.php?file=<?= urlencode($row['cv_link']) ?>">View CV</a>
                                <?php else: ?>
                                    <span class="no-cv">No CV</span>
                                <?php endif; ?>
                            </td>
                            <td><?= !empty($row['portfolio_link']) ? '<a href="' . htmlspecialchars($row['portfolio_link']) . '" target="_blank">View Portfolio</a>' : '-' ?></td>
                            <td><span class="badge badge-<?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></span></td>
                            <td>
                                <?php if($statusFilter == 'pending'): ?>
                                    <a href="update_status.php?id=<?= $row['id'] ?>&action=shortlist&status=<?= htmlspecialchars($statusFilter) ?>" 
                                       class="btn-blue" onclick="return confirm('Are you sure you?')">Shortlist</a>
                                    <a href="update_status.php?id=<?= $row['id'] ?>&action=reject&status=<?= htmlspecialchars($statusFilter) ?>" 
                                       class="btn-red"
                                       onclick="return confirm('Are you sure?')">Reject</a>
                                <?php elseif($statusFilter == 'interview_selected'): ?>
                                    <a href="update_status.php?id=<?= $row['id'] ?>&action=pass&status=<?= htmlspecialchars($statusFilter) ?>" 
                                       class="btn-green" 
                                       onclick="return confirm('Are you sure you?')">Pass</a>
                                    <a href="update_status.php?id=<?= $row['id'] ?>&action=reject&status=<?= htmlspecialchars($statusFilter) ?>" 
                                       class="btn-red"
                                       onclick="return confirm('Are you sure?')">Reject</a>
                                <?php else: ?>

                                    <span class="no-action">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>

                        <tr>
                            <td colspan="7" class="no-data">
                                <p>No applications found.</p>
                                <small>Try changing filters or search terms.</small>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>  
</body>
</html>