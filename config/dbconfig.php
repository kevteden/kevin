<?php
$servername = "localhost";
$username = "nasy";
$password = "";
$dbname = "carsystem";

$dbhandle = mysqli_connect($servername, $username, $password, $dbname);

if (!$dbhandle) {
    die("Csonnection failed: " .mysqli_connect_error());
}
