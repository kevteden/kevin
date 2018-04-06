<?php
session_start();
require_once '../config/connect.php';
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
    <div class="container"> <!-- Start container -->
        <!-- Header -->
        <div class="page-header">
            <h3>User List
            <a class="btn btn-default" href="admindash.php">
            <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
            </a>
            </h3>
        </div>

        <!-- Include PHP script to run upload form -->
        <?php if (isset($_POST['btnSave'])) { ?>
        <div class="alert alert-danger">
        <span class="glyphicon glyphicon-info">
        <strong><?php include '../php_scripts/addcar.php'; ?></strong>
        </span>
        </div>
        <?php } ?>
        <!-- End include PHP script -->

        <!-- <div class="alert alert-success">
        <span class="glyphicon glyphicon-info">
        <strong><?php //echo $successMsg; ?> - redirecting</strong>
        </span>
        </div> -->

        <!-- Start form -->
        <form action="carmod.php" method="post" enctype="multipart/form-data" class="form-horizontal">

            <!-- Model -->
            <div class="form-group">
                <label for="name" class="col-md-2">Model</label>
                <div class="col-md-10">
                <input type="text"  name="model"  class="form-control" required
                value=<?php echo (isset($_POST['btnSave']) && isset($error)) ? $post['model'] : ''; ?>>
                </div>
            </div>
            
            <!-- Transmission -->
            <div class="form-group">
                <label for="position" class="col-md-2">Transmission</label>
                <div class="col-md-10">
                <input type="text"  name="transmission" id="" class="form-control" required
                value=<?php echo (isset($_POST['btnSave']) && isset($error)) ? $post['transmission'] : ''; ?>>
                </div>
            </div>
            
            <!-- Description -->
            <div class="form-group">
                <label for="position" class="col-md-2">Description</label>
                <div class="col-md-10">
                <input type="text"  name="description" id="" class="form-control" required
                value=<?php echo (isset($_POST['btnSave']) && isset($error)) ? $post['description'] : ''; ?>>
                </div>
            </div>

            <!-- Mileage -->
            <div class="form-group">
                <label for="position" class="col-md-2">Mileage</label>
                <div class="col-md-10">
                <input type="text"  name="mileage" id="" class="form-control" required
                value=<?php echo (isset($_POST['btnSave']) && isset($error)) ? $post['mileage'] : ''; ?>>
                </div>
            </div>
            
            <!-- Price -->
            <div class="form-group">
                <label for="position" class="col-md-2">Price</label>
                <div class="col-md-10">
                <input type="text"  name="price" id="name" class="form-control" required
                value=<?php echo (isset($_POST['btnSave']) && isset($error)) ? $post['price'] : ''; ?>>
                </div>
            </div>
            
            <!-- Image -->
            <div class="form-group">
                <label for="photo" class="col-md-2">Select Car Image</label>
                <div class="col-md-10">
                <input type="file"  name="myfile" accept="image/*">
                </div>
            </div>
            
            <!-- Save / Submit button -->
            <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                    <input type="submit" name="btnSave" value="Add Car" class="btn btn-success">
                </div>
            </div>
        </form> <!-- End form -->
    </div> <!-- End container -->

    <!-- JS -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
