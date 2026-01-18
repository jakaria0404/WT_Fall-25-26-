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