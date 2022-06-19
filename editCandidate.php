<?php
session_start();
// $admin1 = $_SESSION['$user_admission_db'];
$newId = $_GET['id'];
error_reporting(0);
include "connection.php";
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$angaliadata = "SELECT * FROM candidate WHERE id='$newId' ";
$vutadata = mysqli_query($connection, $angaliadata);
$matokeo = mysqli_fetch_array($vutadata);
$datafullname = $matokeo['fullname'];
$genderData = $matokeo['gender'];
$currentPhoto = $matokeo['picture'];



if (isset($_POST['edit'])) {
    $filename = $_FILES['photo']['name'];
    $tempFilename = $_FILES['photo']['tmp_name'];
    $folder = 'image/' . $filename;
    $weka = "UPDATE candidate SET fullname='$fullname',picture='$filename',gender='$gender' WHERE id='$newId'";
    $check = mysqli_query($connection, $weka);
    move_uploaded_file($tempFilename, $folder);
    if ($check) {
        header("Location:detailCandidate.php");
        session_destroy();
    } else {
        $edit_error = "SOMETHING WENT WRONG";
    }
} else {
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT CANDIDATE</title>
</head>

<body>
    <nav>
        <a href="./adminMainPage.php">HOME ADMIN</a>
        <br>
        <a href="./index.php">Main Home</a>
    </nav>
    <fieldset style="width:25%;margin-top:10%;margin-left:40%">
        <legend align="center"><img src="./image/<?php echo $currentPhoto ?>" style="width=150px;height:100px;"></legend>

        <Form method="POST" enctype="multipart/form-data">

            <h3><label for="select"><span style="color:blue; margin-left:20%;">CURRENT FULL NAME:<span style="color:red;"><?php echo  $datafullname; ?>
                </label></h3>
            <h3><label for="select"><span style="color:blue; margin-left:24%;">GENDER:<span style="color:red;"><?php echo $genderData; ?>
                </label>
            </h3><br>
            <label for="select"><span style="color:green;">Edit Fullname:</span></label>
            <input type="text" name="fullname" placeholder="EDIT FULLNAME" required><br>
            <br>
            <label for="select"><span style="color:green;">Edit Gender:</span></label>
            <input class="gender" type="radio" name="gender" value="Female" required>Female
            <input class="gender" type="radio" name="gender" value="Male" required>Male
            <span style="color:red;"><?php echo "$gender_error" ?></span><br>
            <br>
            <label>UPLOAD PHOTO</label>
            <input type="file" name="photo" required><br><br>
            <span><?php echo $photo_reply; ?></span><br><br>
            <fieldset>
                <legend align="center"><button style="width:120px;height: 50px;;background-color:yellow;color:blue;" type="submit" name="edit">EDIT</button></legend>

            </fieldset>
        </Form>
    </fieldset>
</body>

</html>