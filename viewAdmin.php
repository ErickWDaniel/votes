<?php
include "connection.php";
$angaliadata = "SELECT * FROM admini";
$daka = mysqli_query($connection, $angaliadata);
$numberOfData = mysqli_num_rows($daka);
$result = mysqli_fetch_array($daka);
$id = $result['id'];
if (isset($_POST['delete'])) {
    $sqlTable = "DELETE FROM admini WHERE id ='$id'";
    $sqlCheck = mysqli_query($connection, $sqlTable);
    if ($sqlCheck) {
        header("Location:viewAdmin.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admins</title>
</head>

<body>
    <a Style="color:red;" href="./adminMainPage.php">HOME ADMIN</a><br>
    <a Style="color:red;" href="./detailAdmin.php">NEW REGISTER</a>

    <form method="post">
        <fieldset style="width:80%;margin:auto;">
            <legend align="center">View Admins</legend>
            <table border="1" width="80%" align="center" height="20%">
                <th>SN</th>
                <th>NAME</th>
                <th>PASSWORD</th>
                <th>DELETE</th>

                <?php

                $angaliadata = "SELECT * FROM admini";
                $daka = mysqli_query($connection, $angaliadata);
                $numberOfData = mysqli_num_rows($daka);
                for ($i = 1; $i <= $numberOfData; $i++) {
                    $result = mysqli_fetch_array($daka);
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['fullname']; ?></td>
                        <td><?php echo $result['password']; ?></td>
                        <td><button name="delete">DELETE</button></td>
                    </tr>
                <?php
                }
                ?>
            </table>
    </form>
    </fieldset>
</body>

</html>