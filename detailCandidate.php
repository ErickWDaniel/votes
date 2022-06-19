<?php
// session_start();
// include "adminSession.php";
require_once "connection.php";

$angaliadata = "SELECT * FROM candidate";
$daka = mysqli_query($connection, $angaliadata);
$numberOfData = mysqli_num_rows($daka);
$result = mysqli_fetch_array($daka);
$id = $result['id'];
if (isset($_POST['delete'])) {

    $sqlTable = "DELETE FROM candidate WHERE id ='$id'";
    $sqlCheck = mysqli_query($connection, $sqlTable);
    if ($sqlCheck) {
        header("Location:detailCandidate.php");
        session_destroy();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates</title>
</head>


<body>
    <nav>
        <a href="./adminMainPage.php">HOME ADMIN</a>
    </nav>
    <fieldset style="width:80%;margin:auto;">
        <legend align="center">View Candidates</legend>
        <form method="post">
            <table border="1" width="80%" align="center" height="20%">
                <th>SN</th>
                <th>NAME</th>
                <th>GENDER</th>
                <th>VOTES</th>
                <th>EDIT</th>
                <th>DELETE</th>
                <?php

                $angaliadata = "SELECT * FROM candidate";
                $daka = mysqli_query($connection, $angaliadata);
                $numberOfData = mysqli_num_rows($daka);
                for ($i = 1; $i <= $numberOfData; $i++) {
                    $result = mysqli_fetch_array($daka);
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['fullname']; ?></td>
                        <td><?php echo $result['gender']; ?></td>
                        <td><?php echo $result['vote']; ?></td>
                        <td><button name="edit"><a href="editCandidate.php?id=<?php echo $result['id']; ?>">EDIT</a></button></td>
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