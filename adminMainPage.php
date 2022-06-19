<?php
session_start();
if (empty($_SESSION['$user_admission_db'])) {
    header("Location:adminLogin.php");
    die();
}
if (isset($_POST['button'])) {
    $decide = $_POST['button'];
    switch ($decide) {
        case 'home':
            session_destroy();
            header("Location:index.php");
            break;
        case 'registerCandidate':
            header("Location:registerCandidate.php");
            break;
        case 'detailCandidate':
            header("Location:detailCandidate.php");
            break;
        case 'detailReg':
            header("Location:detailReg.php");
            break;
        case 'detailAdmin':
            header("Location:detailAdmin.php");
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN HOME</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav>
        <a href="index.php"> Logout</a>
    </nav>
    <br><br><br>
    <hr>
    <h1 id="h1">ADMINISTRATOR PANEL</h1>
    <hr>
    <marquee id="marquee">This Page should be Treated with care(Secured)</marquee>
    <hr><br>
    <form action="" method="POST">
        <button type="submit;" name="button" value="home"><span id="submit">MAIN HOME</span></button><br>
        <button type="submit;" name="button" value="registerCandidate"><span id="submit">REGISTER CANDIDATES</span></button><br>
        <button type="submit;" name="button" value="detailCandidate"><span id="submit">VIEW CANDIDATES</span></button><br>
        <button type="submit;" name="button" value="detailReg"><span id="submit">VIEW VOTERS</span></button><br>
        <button type="submit;" name="button" value="detailAdmin"><span id="submit">REGISTER NEW ADMINISTRATOR</span></button><br>
        <button type="submit;" name="button" value="detailAdmin"><span id="submit"><a style="color:white;" href="./results.php">RESULTS</a></span></button><br>

    </form>


</body>

</html>