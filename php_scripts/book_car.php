<?php
if (isset($_GET['id'])) {
	include_once '../config/dbconfig.php';
	$query = "SELECT model FROM tbl_cars WHERE car_id = {$_GET['id']} LIMIT 1";
	$car = mysqli_fetch_assoc(mysqli_query($dbhandle, $query));
	$car = $car['model'];
}

if (isset($_POST['book'])) {
	include_once '../config/dbconfig.php';
	include_once '../php_scripts/functions.php';
	
	// Grab post data and sanitize it
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post = array_map('sanitizeVar', $post);
		
		var_dump($_SESSION);
}
