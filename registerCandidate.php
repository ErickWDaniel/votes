<?php
// session_start();
// include "adminSession.php";
include "connection.php";


$fullname_error =  $gender_error =  $photo_error = "";
$fullname = "";
$gender  = "";


if (isset($_POST['submit'])) {

    if (empty($_POST['fullname'])) {
        $fullname_error = "Enter your name";
    } else {
        $fullname = $_POST['fullname'];
    }
    if (empty($_POST['gender'])) {
        $gender_error = "Select your Gender";
    } else {
        $gender = $_POST['gender'];
    }
    if (!empty($fullname) && !empty($gender)) {
        $sqlEnter = "INSERT INTO candidate(fullname,gender) VALUES ('$fullname','$gender')";
        $sqlReceive = mysqli_query($connection, $sqlEnter);
        $sqlLists = mysqli_fetch_array($sqlReceive);

        if ($sqlReceive) {
            $filename = $_FILES['photo']['name'];
            $tempFilename = $_FILES['photo']['tmp_name'];
            $folder = 'image/' . $filename;
            $upLoadNow = "UPDATE candidate SET picture='$filename' WHERE fullname='$fullname'";
            $picReceived = mysqli_query($connection, $upLoadNow);
            if (move_uploaded_file($tempFilename, $folder)) {
                header("Location:adminMainPage.php");
            } else {
                echo "SOMETHING WENT WRONG";
            }
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
    <title>CANDIDATE REGISTRATION FORM</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <a href="./adminMainPage.php">HOME ADMIN</a>
    <fieldset>
        <legend>CANDIDATE REGISTRATION FORM</legend>
        <form method="post" enctype="multipart/form-data">
            <hr><br>
            <label id="label" for="fullname">FULL NAME</label><br>
            <input type="text" name="fullname"><br>
            <span style="color:red;"><?php echo "$fullname_error"; ?></span><br><br>
            <label id="label" for="gender">GENDER</label><br>
            <input class="gender" type="radio" name="gender" value="Female">Female
            <input class="gender" type="radio" name="gender" value="Male">Male
            <span style="color:red;"><?php echo "$gender_error" ?></span><br>
            <br>
            <label id="label" for="admission">PICTURE</label><br>
            <input type="file" name="photo" required><br>
            <span style="color:red;"><?php echo "$photo_error;" ?></span><br><br>
            <button class="button" name="submit">REGISTER</button>

        </form>
    </fieldset>
</body>

</html>