<?php include "../php/employees.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees Admin</title>
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
    <link rel="stylesheet" href="../css/employee_page/employees.css">
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
</head>
<body>

<div class="dashboard-container">
    <?php include "sidebar.php"; ?>

    <main class="main-content">
        <?php include "header.php"; ?>

        <div class="page-content">
            <h2>Employee Management</h2>

         <div class="filter-box">
                <form method="GET">
                    <div class="search-group">
                        <label>Search:</label>
                        <input type="text" name="search"><button type="submit" class="btn-search">Search</button>
                    </div>
                       <div class="input-group">
                        <label>Category:</label>
                        <select name="category">
                            <option value="all">All</option>
                            <option value="developer" <?php if($category == 'developer') echo 'selected'; ?>>Developer</option>
                            <option value="researcher" <?php if($category == 'researcher') echo 'selected'; ?>>Researcher</option>
                        </select>
                    </div>
                        <div class="input-group">
                        <label>Rank:</label>
                        <select name="rank">
                            <option value="all">All</option>
                            <option value="junior" <?php if($rank == 'junior') echo 'selected'; ?>>Junior</option>
                            <option value="senior" <?php if($rank == 'senior') echo 'selected'; ?>>Senior</option>
                            <option value="lead" <?php if($rank == 'lead') echo 'selected'; ?>>Lead</option>
                            <option value="manager" <?php if($rank == 'manager') echo 'selected'; ?>>Manager</option>
                        </select>
                    </div>
                           <div class="button-group">
                        <button type="submit" class="btn-search">Filter</button>
                        <a href="employees.php" class="btn-reset">Reset ALL</a>
                    </div>
                </form>
            </div>

            <p>Total: <strong><?php echo $totalEmployees; ?></strong></p>

              <div class="tableEmployee">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Category</th>
                            <th>Rank</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                       <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['unique_id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><span class="badge"><?php echo $row['category']; ?></span></td>
                                <td><span class="badge rank-<?php echo $row['rank']; ?>"><?php echo $row['rank']; ?></span></td>
                                <td class="action-cell">
                                    <select onchange="location = this.value;">
                                        <option disabled selected>Rank</option>
                                        <option value="?id=<?php echo $row['id']; ?>&promote=1&new_rank=junior">Junior</option>
                                        <option value="?id=<?php echo $row['id']; ?>&promote=1&new_rank=senior">Senior</option>
                                        <option value="?id=<?php echo $row['id']; ?>&promote=1&new_rank=lead">Lead</option>
                                        <option value="?id=<?php echo $row['id']; ?>&promote=1&new_rank=manager">Manager</option>
                                    </select>
                                    <a href="?id=<?php echo $row['id']; ?>&remove=1" class="btn-remove" onclick="return confirm('Confirm?');">Remove</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>