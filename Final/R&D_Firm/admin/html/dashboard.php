<?php include "../php/dashboard.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Nilkham</title>
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
   <link rel="stylesheet" href="../css/dashboard_page/kpi.css">
    <link rel="stylesheet" href="../css/dashboard_page/statistics.css">
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">



</head>
<body>
    <div class="dashboard-container">
        <?php include "sidebar.php"; ?>
        <main class ="main-content">
            <?php include "header.php"; ?>
            
            <div class="dashboard-content">
                    <h2>Dashboard</h2>

                    <div class="statistics-section-dashboard">
                        <h3>Firm Statistics</h3>
                        <div class="stats-grid-dashboard">
                            <div class="stat-card-dashboard">
                                <h3><?php echo $totalApplications; ?></h3>
                                <p>Total Applications</p>
                            </div>
                            <div class="stat-card-dashboard">   
                                <h3><?php echo $totalJobs; ?></h3>
                                <p>Total Job Posted</p>
                            </div>
                            <div class="stat-card-dashboard">
                                <h3><?php echo $totalEmployees; ?></h3>
                                <p>Total Employees</p>
                            </div>
                            <div class="stat-card-dashboard">
                                <h3><?php echo $completedProjects; ?></h3>
                                <p> Firm's Total Completed Projects </p>
                            </div>
                        </div>
                    </div>
                    
                <div class="kpi-grid">
                    <div class="kpi-card">
                        <div class="kpi-icon">👥</div>
                        <div class="kpi-info">
                            <h3>Total Members</h3>
                            <p class="kpi-value"><?php echo $totalMembers; ?></p>
                        </div>
                    </div>
                    <div class="kpi-card">
                            <div class="kpi-icon">📋</div>
                        <div class="kpi-info">
                            <h3>Total Tasks</h3>
                            <p class="kpi-value"><?php echo $totalTasks; ?></p>
                        </div>
                    </div>
                    
                    <div class="kpi-card">
                        <div class="kpi-icon">📝</div>
                        <div class="kpi-info">
                            <h3>Pending Applications</h3>
                            <p class="kpi-value"><?php echo $pendingApplications; ?></p>
                        </div>
                    </div>
                     <div class="kpi-card">
                        <div class="kpi-icon">💰</div>
                        <div class="kpi-info">
                            <h3>Total Payments</h3>
                            <p class="kpi-value">$<?php echo $totalPayments; ?></p>
                        </div>
                    </div>
                </div>
            </div>   
        </main>

</div>
    <script src="../js/dashboard.php"></script>
</body>
</html>