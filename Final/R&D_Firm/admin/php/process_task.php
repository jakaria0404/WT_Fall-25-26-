<?php
include "auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);

    $status = 'pending';

    if (isset($_SESSION['unique_id'])) {
        $assigned_by = $_SESSION['unique_id'];
    } else {
        $assigned_by = 'Nilkham Admin';
    }

    if (!empty($title) && !empty($description) && !empty($employee_id)) {
        $sql = "INSERT INTO tasks (title, description, employee_id, assigned_by, status, deadline)
                VALUES ('$title', '$description', '$employee_id', '$assigned_by', '$status', '$deadline')";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../html/tasks.php?status=success");
            exit();
        } else {
            $error_msg = mysqli_error($conn);
            header("Location: ../html/tasks.php?status=error&msg=" . urlencode($error_msg));
            exit();
        }
    } else {
        header("Location: ../html/tasks.php?status=error&msg=Please fill all required fields");
        exit();
    }
}
?>
