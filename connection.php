<?php
define("SERVER", 'localhost');
define("USERNAME", 'root');
define("PASSWORD", '');
define("DATABASE", 'election');

$connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);
if (!$connection) {
    echo "not connected";
}
