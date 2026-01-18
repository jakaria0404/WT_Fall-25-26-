<?php
session_start();
include "../db/db.php";

if (isset($_SESSION["username"]) && isset($_SESSION["role"])) {
    switch ($_SESSION["role"]) {
        case 'admin':
            header("Location:/admin/html/dashboard.php");
            break;
        case 'employee':
            header("Location:/employee/html/dashboard.php");
            break;
        default:
            header("Location:/Home/index.php");
            break;
    }
    exit();
}

$error = "";
$username = "";
$usererror = "";
$passerror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (empty($username)) {
        $usererror = "Username is required";
    }

    if (empty($password)) {
        $passerror = "Password is required";
    }

    if (empty($usererror) && empty($passerror)) {
        $sql = "SELECT id, username, password, role FROM USERS WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];

                    if ($row['role'] == 'admin') {
                        header("Location:/admin/html/dashboard.php");
                    } elseif ($row['role'] == 'employee') {
                        header("Location:/employee/html/dashboard.php");
                    } else {
                        header("Location:/Home/index.php");
                    }
                    exit();
                } else {
                    $error = "Invalid password";
                }
            } else {
                $error = "No user found with that username";
            }

            mysqli_stmt_close($stmt);
        } else {
            $error = "Database query failed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>

<div class="login-container">
    <h1>Login</h1>

    <?php
    if ($error) {
        echo '<p class="error" style="text-align: center;">' . $error . '</p>';
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <span class="error"><?php echo $usererror; ?></span>

        <label>Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passerror; ?></span>

        <input type="submit" name="submit" value="Login" class="loginbtn">

        <div class="footer-links">
            <p>New here?</p>
            <a href="register.php" class="create-btn">Create New Account</a>
        </div>
    </form>
</div>

</body>
</html>
