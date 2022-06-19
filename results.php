<?php
include "connection.php";
$chukuaVotes2 = "SELECT vote FROM candidate WHERE id='2'";
$pelekaVotes2 = mysqli_query($connection, $chukuaVotes2);
$pakuaVotes2 = mysqli_fetch_array($pelekaVotes2);
$candVote2 = $pakuaVotes2['vote'];

$chukuaVotes = "SELECT vote FROM candidate WHERE id='1'";
$pelekaVotes = mysqli_query($connection, $chukuaVotes);
$pakuaVotes = mysqli_fetch_array($pelekaVotes);
$candVote = $pakuaVotes['vote'];
$totalVotes = $candVote + $candVote2;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<nav>
        <a href="./index.php">Home</a>
    </nav>
    <fieldset>
        <h1 id="h1">THANK YOU FOR VOTING</h1>
        <h2 style="color:blue;font-weight:bold;align:center;text-align:center">RESULTS</h2>
        <h3 style="color:blue;font-weight:bold;align:center;text-align:center" for="">CANDIDATE 1 VOTES:<span style="color:red;"><?php echo $candVote ?></span></h3>
        <h3 style="color:blue;font-weight:bold;align:center;text-align:center" for="">CANDIDATE 2 VOTES:<span style="color:red;"><?php echo $candVote2 ?></span></h3>
        <h3 style="color:blue;font-weight:bold;align:center;text-align:center" for="">TOTAL VOTES:<span style="color:red;"><?php echo $totalVotes ?></span></h3>
    </fieldset>

</body>

</html>