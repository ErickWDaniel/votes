<?php
session_start();
include "connection.php";
$admission_error = $password_error = $login_warning = $login_error = "";
$admission = "";
$password = "";
if (isset($_POST['submit'])) {


    if (empty($_POST['admission'])) {
        $admission_error = "Enter your Admission Number";
    } else {
        $admission = $_POST['admission'];
    }
    if (empty($_POST['password'])) {
        $password_error = "Enter your Password";
    } else {
        $password = ($_POST['password']);
    }
    if (!empty($admission)  && !empty($password)) {
        $sqlEnter = "SELECT * FROM register WHERE admission='$admission'";
        $sqlReceive = mysqli_query($connection, $sqlEnter);
        $sqlCheck = mysqli_fetch_array($sqlReceive);
        $user_password_db = $sqlCheck['password'];
        $user_admission_db = $sqlCheck['admission'];
        if (password_verify($password, $user_password_db)) {
            $_SESSION['admission'] = $user_admission_db;
            header("Location:candidate_vote.php");
        } else if (!password_verify($password, $user_password_db)) {
            $login_error = "WRONG PASSWORD " . "<br>" . "Sorry You Cant View Results Nor Vote.";
        }
    } else {
        $login_warning = "WARNING MISUSES OF THE SYSTEM" . "<br>"  . "STOP OR FACE JAIL TIME.";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <nav>
        <a href="./index.php">Home</a>
    </nav>
    <fieldset>
        <legend>LOGIN </legend>
        <form method="post">
            <hr><br>
            <label id="label" for="admission">ADMISSION NUMBER</label><br>
            <input type="number" name="admission"><br>
            <span style="color:red;"><?php echo "$admission_error"; ?></span><br><br>
            <label id="label" for="password">PASSWORD</label><br>
            <input type="password" name="password"><br>
            <span style="color:red;"><?php echo "$password_error"; ?></span><br><br>
            <span style="color:red;"><?php echo "$login_error"; ?></span><br>
            <span style="color:red;"><?php echo "$login_warning"; ?></span><br>
            <button class="button" name="submit">Login</button>


        </form>
    </fieldset>
</body>