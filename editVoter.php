<?php
// session_start();
// include "adminSession.php";
$newId = $_GET['id'];
error_reporting(0);
include "connection.php";
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$admission = $_POST['admission'];
$angaliadata = "SELECT * FROM register WHERE id='$newId' ";
$vutadata = mysqli_query($connection, $angaliadata);
$matokeo = mysqli_fetch_array($vutadata);
$fullnameData = $matokeo['fullname'];
$genderData = $matokeo['gender'];
$admissionData = $matokeo['admission'];

if (isset($_POST['edit'])) {
    $weka = "UPDATE register SET fullname='$fullname', admission='$admission',gender='$gender'WHERE id='$newId'";
    $check = mysqli_query($connection, $weka);
    if ($check) {
        header("Location:detailReg.php");
        session_destroy();
    } else {
        $edit_error = "SOMETHING WENT WRONG";
    }
} elseif (isset($_POST['cancel'])) {
    Header("Location:detailReg.php");
    session_destroy();
} else {
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
    </nav>
    <fieldset style="width:25%;margin-top:10%;margin-left:40%">
        <legend align="center"><img src="./image/<?php echo $currentPhoto ?>" style="width=150px;height:100px"></legend>

        <Form method="POST" enctype="multipart/form-data">

            <h3><label for="select"><span style="color:blue; margin-left:20%;">CURRENT FULL NAME:<span style="color:red;"><?php echo  $fullnameData; ?>
                </label></h3>
            <h3><label for="select"><span style="color:blue; margin-left:20%;">CURRENT ADMISSION:<span style="color:red;"><?php echo  $admissionData; ?>
                </label></h3>
            <h3><label for="select"><span style="color:blue; margin-left:24%;">GENDER:<span style="color:red;"><?php echo $genderData; ?>
                </label>
            </h3><br>
            <label for="select"><span style="color:green;">Edit Fullname:</span></label>
            <input type="text" name="fullname" placeholder="EDIT FULLNAME"><br>
            <br>
            <label for="select"><span style="color:green;">Edit Admission:</span></label>
            <input type="text" name="admission" placeholder="EDIT ADMISSION"><br>
            <br>
            <label for="select"><span style="color:green;">Edit Gender:</span></label>
            <input type="text" name="gender" placeholder="EDIT Gender"><br>
            <br>

            <fieldset style="width:32%;margin-top:auto;margin-left:30%">
                <button style="background-color:yellow;color:blue;" type="submit" name="edit">EDIT</button>
                <button style="background-color:green;color:yellow;" type="submit" name="cancel">CANCEL</button><br><br>

            </fieldset>
        </Form>
    </fieldset>
</body>

</html>