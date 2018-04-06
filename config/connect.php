<?php
$servername = "localhost";
$username = "nasy";
$password = "";
$dbname = "carsystem";

$conn= mysqli_connect($servername,$username,$password,$dbname);
if (!$conn){
	
	die("connection failed:=" .mysqli_connect_error());
}




?>