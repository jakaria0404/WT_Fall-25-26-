<aside class="sidebar">
    <div class="sidebar-header">
        <h2>Nilkham</h2>
    </div>

    
    
    
    <nav class="sidebar-nav"> 
        <div class="nav-section">
            <h3>GENERAL</h3>
            <?php
                function active($page) {
                    $current_page = basename($_SERVER['PHP_SELF']);
                    return $current_page === $page ? 'active' : '';
                }
            ?>
            <ul>
                <li class="<?php echo active('dashboard.php'); ?>">
                    <a href="dashboard.php">Dashboard</a>
                </li>

                <li class="<?php echo active('job_posting.php'); ?>">
                    <a href="job_posting.php">Job Circular Posting</a>
                </li>

                <li class="<?php echo active('applications.php'); ?>">
                    <a href="applications.php">Applications Management</a>
                </li>

                <li class="<?php echo active('employees.php'); ?>">
                    <a href="employees.php">Employees</a>
                </li>

                <li class="<?php echo active('tasks.php'); ?>">
                    <a href="tasks.php">Task Assignment</a>
                </li>

                <li class="<?php echo active('payments.php'); ?>">
                    <a href="payments.php">Payments</a>
                </li>

                <li class="<?php echo active('user_management.php'); ?>">
                    <a href="user_management.php">User Management</a>
                </li>

                <li class="<?php echo active('contact_messages.php'); ?>">
                    <a href="contact_messages.php">Contact Messages</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
