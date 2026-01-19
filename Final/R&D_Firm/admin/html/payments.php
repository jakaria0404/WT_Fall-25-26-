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
        <main class ="main-content">
            <?php include "header.php"; ?>
            <div class="page-content">
    <div class="my-form-box">
        <h3>Make a Payment</h3>

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
       