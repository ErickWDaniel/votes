<?php
if (isset($_POST['button'])) {
    $decide = $_POST['button'];
    switch ($decide) {
        case 'home':
            header("Location:index.php");
            break;
        case 'register':
            header("Location:registration.php");
            break;
        case 'login':
            header("Location:login.php");
            break;
        case 'administration':
            header("Location:adminLogin.php");
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
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <br><br><br>
    <hr>
    <h1 id="h1">ATC ONLINE ELECTION SYSTEM</h1>
    <hr>
    <marquee id="marquee">Vote!!! Voting Its Your Constitutional Right</marquee>
    <hr><br>
    <form action="" method="POST">
        <button type="submit;" name="button" value="register"><span id="submit">VOTER REGISTER</span></button><br>
        <button type="submit;" name="button" value="login"><span id="submit">LOGIN TO VOTE</span></button><br>
        <button type="submit;" name="button" value="administration"><span id="submit">ADMINISTRATOR</span></button><br>
    </form>


</body>

</html>