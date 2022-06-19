<?php
error_reporting(0);
session_start();
// include "voterSession.php";
include "connection.php";

$candidate1_vote = $candidate2_vote = "";
$Admission_number = $_SESSION['admission'];
$sqldb = "SELECT * FROM register WHERE admission='$Admission_number'";
$sqlCheck = mysqli_query($connection, $sqldb);
$checkdata = mysqli_fetch_array($sqlCheck);
$status = $checkdata['statuss'];
$id = $checkdata['id'];
$decide = $_POST['candidate'];
if ($status == 0) {
    if (isset($_POST['submit'])) {

        $sqlStatus = "UPDATE register SET statuss=1 WHERE id='$id'";
        $sqlPokea = mysqli_query($connection, $sqlStatus);
        if ($sqlPokea) {
            switch ($decide) {
                case 'A':
                    $chukuaVotes = "SELECT * FROM candidate WHERE id=1";
                    $pelekaVotes = mysqli_query($connection, $chukuaVotes);
                    $pakuaVotes = mysqli_fetch_array($pelekaVotes);
                    $a = $pakuaVotes['vote'];
                    $candVote =  $a + 1;
                    $sqlVotes = "UPDATE candidate SET vote='$candVote' WHERE id=1";
                    $sqlVoteReceive = mysqli_query($connection, $sqlVotes);
                    if ($sqlVoteReceive) {
                        header("Location:results.php");
                        break;
                    }
                case 'B':
                    $chukuaVotes2 = "SELECT * FROM candidate WHERE id=2";
                    $pelekaVotes2 = mysqli_query($connection, $chukuaVotes2);
                    $pakuaVotes2 = mysqli_fetch_array($pelekaVotes2);
                    $b = $pakuaVotes2['vote'];
                    $candVote2 = $b + 1;
                    $sqlVotes2 = "UPDATE candidate SET vote='$candVote2' WHERE id=2";
                    $sqlVoteReceive2 = mysqli_query($connection, $sqlVotes2);
                    if ($sqlVoteReceive2) {
                        header("Location:results.php");
                        break;
                    }
            }
        }
    }
} elseif ($status == 1) {
    header("Location:results.php");
    session_destroy();
} else {
    echo "SOMETHING WRONG HAPPENED";
}

/*______________JUST FOR VIEW DETAILS ______________*/

$candidate1_photo = $candidate2_photo = "";
$candDb = "SELECT * FROM candidate LIMIT 1";
$candCheck = mysqli_query($connection, $candDb);
$candReceive = mysqli_fetch_array($candCheck);
$candPhoto = $candReceive['picture'];
$candName1 = $candReceive['fullname'];
$candDb2 = "SELECT * FROM candidate LIMIT 2 OFFSET 1";
$candCheck2 = mysqli_query($connection, $candDb2);
$candReceive2 = mysqli_fetch_array($candCheck2);
$candPhoto2 = $candReceive2['picture'];
$candName2 = $candReceive2['fullname'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav>
        <a href="./index.php">Home</a>
    </nav>

    <fieldset>
        <form method="post">
            <img src="./image/<?php echo $candPhoto; ?>" width="400px" height="300px"><span style="color:red; font-size:23px; font-weight:bold;"><br>NAME:<?php echo $candName1 ?></span>
            <input type="radio" name="candidate" value="A"><br>
            <img src="./image/<?php echo $candPhoto2; ?>" width="400px" height="300px"> <span style="color:red; font-size:23px; font-weight:bold;"><br>NAME:<?php echo $candName2 ?></span>
            <input type="radio" name="candidate" value="B"><br>
            <button class="button" name="submit">VOTE</button>
        </form>
    </fieldset>
    <h1 id="h1">VOTE FOR YOUR CANDIDATE</h1>



</body>

</html>