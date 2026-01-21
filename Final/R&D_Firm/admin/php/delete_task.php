<?php
include "auth.php";
include_once "../db/db.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM tasks WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../html/tasks.php?msg=deleted");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>