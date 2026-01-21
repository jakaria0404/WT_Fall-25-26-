<?php
include "../php/auth.php";
include_once "../db/db.php";

if (isset($_POST['send_payment'])) {
    $emp_id = $_POST['employee_id'] ?? '';
    $cash   = $_POST['cash'] ?? '';
    $note   = $_POST['note'] ?? '';
    $sender = $_SESSION['unique_id'] ?? 'NILKHAM AUTHOR';

    if ($cash !== "") {
        $sql = "INSERT INTO payments (employee_id, amount, description, paid_by)
                VALUES ('$emp_id', '$cash', '$note', '$sender')";
        mysqli_query($conn, $sql);
        header("Location: payments.php?status=success");
        exit();
    } else {
        header("Location: payments.php?status=error");
        exit();
    }
}

$query = "SELECT username, unique_id, email, rank FROM users WHERE role = 'employee'";
$result = mysqli_query($conn, $query);
$employees = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }
}
$field_name = 'emp_id';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="../css/dashboard_page/header.css">
    <link rel="stylesheet" href="../css/dashboard_page/sidebar.css">
    <link rel="stylesheet" href="../css/payments_page/payments.css">
    <link rel="stylesheet" href="../css/dashboard_page/dashboard.css">
</head>
<body>
<div class="dashboard-container">
    <?php include "sidebar.php"; ?>
    <main class="main-content">
        <?php include "header.php"; ?>
        <div class="page-content">
            <div class="my-form-box">
                <h3>Make a Payment</h3>

                      <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] === 'success') {
                echo "<p class='info-text'>Payment Done!</p>";
            } elseif ($_GET['status'] === 'error') {
                echo "<p class='info-text'>Payment Failed!</p>";
            }
        }
        ?>
        
                <form method="post">
                    <label>Employee ID:</label>
                    <?php include "../php/employee_search.php"; ?>

                    <label>Amount:</label>
                    <input type="number" name="cash" class="input-style" required>

                    <label>Notes:</label>
                    <textarea name="note" class="input-style"></textarea>

                    <button type="submit" name="send_payment" class="btn-send">Submit Now</button>
                </form>
            </div>
            
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Paid By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $view_data = mysqli_query($conn, "SELECT * FROM payments ORDER BY id DESC");
                    while ($row = mysqli_fetch_assoc($view_data)) {
                        ?>
                        <tr>
                            <td><?php echo $row['employee_id']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['paid_by']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>