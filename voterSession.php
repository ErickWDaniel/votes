<?php
if (empty($_SESSION['admission'])) {
    header("Location:login.php");
    die();
}
