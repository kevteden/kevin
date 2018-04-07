<?php

if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'admin') {
    header('Location: ../');
    exit;
}
include_once 'config/dbconfig.php';
$upload_dir = 'uploads/';

if(isset($_POST['btnSave'])){
	$model = $_POST['model'];
	$transmission = $_POST['transmission'];
	$description = $_POST['description'];
	$mileage = $_POST['mileage'];
	$price = $_POST['price'];
	$imgName = $_FILES['myfile']['name'];
	$imgTmp = $_FILES['myfile']['tmp_name'];
	$imgSize = $_FILES['myfile']['size'];


	if (empty($model)){
		$errorMsg = 'Please input name';
		
	}elseif(empty($transmission)){
		
	$errorMsg = 'Please input position';
	
	}elseif(empty($imgName)){
		
		$errorMsg = 'Please select image';
	}else{
		
		//get image extension
		$imgExt = strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
		//allow extension
		$allowExt = array('jpeg','jpg','png','gif');
		//random new name for photo
		$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
		//check a valid image
		if(in_array($imgExt,$allowExt)){
		//check image size less than 5mb
     if($imgSize < 5000000){
		move_uploaded_file($imgTmp,$upload_dir.$userPic);
	 }else{
		 	$errorMsg = 'Image too large';
	 }
	 
		}else{
			$errorMsg = 'Please select a valid image';
		}
		
	}
	//check upload file not an error then insert data to database 
	if(!isset($errorMsg)){
	$sql = "INSERT INTO tbl_cars(model,transmission,description,mileage,price,photo)
	VALUES('".$model."','".$transmission."','".$description."','".$mileage."','".$price."','".$userPic."')";  
	$result = mysqli_query($conn,$sql);
	if($result){
		$successMsg = 'New record added successfully';
		header('refresh:5;carindex.php');
	}else{
		$errorMsg = 'Error'.mysqli_error($conn);
	}
	}
}

?>