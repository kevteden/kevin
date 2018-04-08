<?php
session_start();

if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'admin') {
    header('Location: ../');
    exit;
} else {
    require '../config/dbconfig.php';
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width,initial-scale = 1">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
    <title>Update car</title>
</head>
<body>
    <div class="container"> <!-- Start container -->
        <!-- Header -->
        <div class="page-header">
            <h3>
                <a class="btn btn-default" href="admindash.php">
                    <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                </a> 
            Update car details
            
            </h3>
        </div>

        <!-- Include PHP script to run upload form -->
        <?php if (isset($_GET['id']) || isset($_POST['update'])) { ?>
        <div class="alert alert-danger">
        <span class="glyphicon glyphicon-info">
        <strong><?php require '../php_scripts/update_car.php'; ?></strong>
        </span>
        </div>
        <?php } ?>
        <!-- End include PHP script -->

        <!-- Start form -->
        <form action="caredit.php" method="post" enctype="multipart/form-data" class="form-horizontal">

            <!-- Hidden car ID -->
            <input type="text" hidden name="carID" value="<?php echo (isset($_GET['id'])) ? $car['car_id'] : ''; ?>">
            
            <!-- Model -->
            <div class="form-group">
                <label for="name" class="col-md-2">Model</label>
                <div class="col-md-10">
                <input type="text"  name="model"  class="form-control" required
                value="<?php
                echo (isset($_GET['id'])) ? $car['model'] : '';
                echo (isset($error)) ? $post['model'] : '';?>">
                </div>
            </div>
            
            <!-- Transmission -->
            <div class="form-group">
                <label for="position" class="col-md-2">Transmission</label>
                <div class="col-md-10">
                <input type="text"  name="transmission" id="" class="form-control" required
                value="<?php echo (isset($_GET['id'])) ? $car['transmission'] : ''; echo (isset($error)) ? $post['transmission'] : ''; ?>">
                </div>
            </div>
            
            <!-- Description -->
            <div class="form-group">
                <label for="position" class="col-md-2">Description</label>
                <div class="col-md-10">
                <input type="text"  name="description" id="" class="form-control" required
                value="<?php echo (isset($_GET['id'])) ? $car['description'] : ''; echo (isset($error)) ? $post['description'] : '';?>">
                </div>
            </div>

            <!-- Mileage -->
            <div class="form-group">
                <label for="position" class="col-md-2">Mileage</label>
                <div class="col-md-10">
                <input type="text"  name="mileage" id="" class="form-control" required
                value="<?php echo (isset($_GET['id'])) ? $car['mileage'] : ''; echo (isset($error)) ? $post['mileage'] : '';?>">
                </div>
            </div>
            
            <!-- Price -->
            <div class="form-group">
                <label for="position" class="col-md-2">Price</label>
                <div class="col-md-10">
                <input type="text"  name="price" id="name" class="form-control" required
                value="<?php echo (isset($_GET['id'])) ? $car['price'] : ''; echo (isset($error)) ? $post['price'] : '';?>">
                </div>
            </div>
            
            <!-- Update / Edit button -->
            <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                    <input type="submit" name="update" value="Update" class="btn btn-success">
                    <a href="./carindex.php" class="btn btn-danger" title="Go back">Cancel</a>
                </div>
            </div>
        </form> <!-- End form -->
    </div> <!-- End container -->

    <!-- JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
