<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>hello</h2>
        <a href = "logout.php" class="logout_btn">Logout</a>
    </body>
</html>