<?php
require_once('config/connect.php');
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
		$errorMsg = 'Please input Model';
		
	}elseif(empty($transmission)){
		
	$errorMsg = 'Please input Transmission';
	
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width,initial-scale = 1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script src ="https://ajax.gooleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="nav.css" type="text/css"/>
<title>Upload Image</title>
</head>
<body>

<div class="container">
<div class="page-header">

<h3>User List
<a class="btn btn-default" href="carindex.php">
<span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back 
</a>
</h3>
</div>

<?php

if(isset($errorMsg)){

?>

<div class="alert alert-danger">
<span class="glyphicon glyphicon-info">
<strong><?php echo $errorMsg; ?></strong>
</span>
</div>

<?php
}

?>

<?php

if(isset($successMsg)){

?>

<div class="alert alert-success">
<span class="glyphicon glyphicon-info">
<strong><?php echo $successMsg; ?> - redirecting</strong>
</span>
</div>

<?php
}

?>





<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="form-group">
<label for="name" class="col-md-2">Model</label>
<div class="col-md-10">
<input type="text"  name="model"  class="form-control">
</div>
</div>
<div class="form-group">
<label for="position" class="col-md-2">Transmission</label>
<div class="col-md-10">
<input type="text"  name="transmission" id="" class="form-control">
</div>
</div>
<div class="form-group">
<label for="position" class="col-md-2">Description</label>
<div class="col-md-10">
<input type="text"  name="description" id="" class="form-control">
</div>
</div>
<div class="form-group">
<label for="position" class="col-md-2">Mileage</label>
<div class="col-md-10">
<input type="text"  name="mileage" id="" class="form-control">
</div>
</div>
<div class="form-group">
<label for="position" class="col-md-2">Price</label>
<div class="col-md-10">
<input type="text"  name="price" id="name" class="form-control">
</div>
</div>
<div class="form-group">
<label for="photo" class="col-md-2">Select Car Image</label>
<div class="col-md-10">
<input type="file"  name="myfile">
</div>
</div>
<div class="form-group">
<label class="col-md-2"></label>
<div class="col-md-10">
<button type="submit" class="btn btn-success" name="btnSave">
<span class="glyphicon glyphicon-save"></span>Save
</button>
</div>
</div>
</form>
</div>
</div>


























<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

