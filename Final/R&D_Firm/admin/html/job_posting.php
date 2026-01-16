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
            <label>Job Title:</label>
                    <input type="text" name="title" value="" required>
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
            


</body>
</html>
