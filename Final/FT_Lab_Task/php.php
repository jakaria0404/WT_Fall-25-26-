<!DOCTYPE html>
<html>
<head><title>PHP Code</title></head>
<body>
<h1> Welcome to Registration</h1>

<?php
$name = $email = $dd = $mm = $yyyy = $gender = $bloodGroup = "";
$nameerror = $emailerror = $doberror = $gendererror = $degreeerror = $blooderror = "";
$degree = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameerror = "Name is req";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameerror = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailerror = "Email is req";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "Invalid email format";
        }
    }

    if (empty($_POST["gender"])) {
        $gendererror = "Gender is req";
    } else {
        $gender = test_input($_POST["gender"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <b>NAME</b><br>
    <input type="text" name="name" value="<?php echo $name;?>">
    <span style="color:red"><?php echo $nameerror; ?></span>
    <br><br>

    <b>EMAIL</b><br>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span style="color:red"><?php echo $emailerror; ?></span>
    <br><br>

    <b>GENDER</b><br>
    <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?>>Female
    <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender=="Male") echo "checked";?>>Male
    <input type="radio" name="gender" value="Other" <?php if (isset($gender) && $gender=="Other") echo "checked";?>>Other
    <span style="color:red"><?php echo $gendererror; ?></span>
    <br><br>

 
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameerror) && empty($emailerror) && empty($gendererror) && empty($degreeerror)) {
    echo "<h3> Your Input: </h3>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Gender: " . $gender . "<br>";

}
?>

</body>
</html>