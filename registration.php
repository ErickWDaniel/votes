<?php
include "connection.php";
$fullname_error = $admission_error = $gender_error = $password1_error = $password_error = $confirmPassword_error = "";
$fullname = "";
$admission = "";
$gender  = "";
$password = "";
$confirm_password = "";

if (isset($_POST['submit'])) {

    if (empty($_POST['fullname'])) {
        $fullname_error = "Enter your name";
    } else {

        $fullname = $_POST['fullname'];
    }
    if (empty($_POST['admission'])) {
        $admission_error = "Enter your Admission Number";
    } else {
        $admission = $_POST['admission'];
    }
    if (empty($_POST['gender'])) {
        $gender_error = "Select your Gender";
    } else {
        $gender = $_POST['gender'];
    }
    if (empty($_POST['password'])) {
        $password_error = "Enter your Password";
    } else {
        $password = $_POST['password'];
    }
    if (empty($_POST['confirm_password'])) {

        $password1_error = "Confirm Your Password";

        if ($confirm_password != $password) {
            $confirmPassword_error = "Password Must Match";
        }
    } else {
        $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
    }
    if (!empty($fullname) && !empty($admission) && !empty($gender) && !empty($confirm_password)) {
        $sqlEnter = "INSERT INTO register(fullname,admission,gender,password) VALUES('$fullname','$admission','$gender','$confirm_password')";
        $sqlReceive = mysqli_query($connection, $sqlEnter);
        if ($sqlReceive) {
            header("Location:index.php");
        } else {
            echo "SOMETHING WENT WRONG";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION FORM</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav>
        <a href="./index.php">Home</a>
    </nav>
    <fieldset>
        <legend>ELECTION REGISTRATION FORM</legend>
        <form method="post">
            <hr><br>
            <label id="label" for="fullname">FULL NAME</label><br>
            <input type="text" name="fullname"><br>
            <span style="color:red;"><?php echo "$fullname_error"; ?></span><br><br>
            <label id="label" for="admission">ADMISSION NUMBER</label><br>
            <input type="number" name="admission"><br>
            <span style="color:red;"><?php echo "$admission_error;" ?></span><br><br>
            <label id="label" for="gender">GENDER</label><br>
            <input class="gender" type="radio" name="gender" value="Female">Female
            <input class="gender" type="radio" name="gender" value="Male">Male
            </select id="gender"><br>
            <span style="color:red;"><?php echo "$gender_error" ?></span><br>
            <br>
            <label id="label" for="password">PASSWORD</label><br>
            <input type="password" name="password"><br>
            <span style="color:red;"><?php echo "$password_error"; ?></span><br><br>

            <label id="label" for="password"> CONFIRM PASSWORD</label><br>
            <input type="password" name="confirm_password"><br>
            <span style="color:red;"><?php echo "$password1_error"; ?></span><br>
            <span style="color:red;"><?php echo "$confirmPassword_error"; ?></span><br><br>
            <button class="button" name="submit">REGISTER</button>

        </form>
    </fieldset>
</body>

</html>