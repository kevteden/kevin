<?php
session_start();

if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'user') {
    header('Location: ../');
    exit;
} else {
    require '../config/connect.php';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width,initial-scale = 1">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
    <script src ="https://ajax.gooleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="nav.css" type="text/css"/>
    <title>Add a new car</title>
</head>
<body>
    <div class="container"> <!-- Start container -->
        <!-- Header -->
        <div class="page-header">
            <h3>
                <a class="btn btn-default" href="bookindex.php">
                    <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                </a> 
            Book Test Drive
            </h3>
        </div>

        <h5 style="color: #f00; text-decoration: underline;">Please note all fields are required</h5>
        <br>

        <!-- Include PHP script to run booking form -->
        <?php if (isset($_POST['book']) || isset($_GET['id'])) { ?>
        <div class="alert alert-success">
        <span class="glyphicon glyphicon-info">
        <strong><?php include '../php_scripts/book_car.php'; ?></strong>
        </span>
        </div>
        <?php } ?>
        <!-- End include PHP script -->

        <!-- Start form -->
        <form action="bookmod.php" method="post" class="form-horizontal">

            <!-- Model -->
			 <!-- Car in question -->
            <div class="form-group">
                <label for="position" class="col-md-2">Car In Question:</label>
                <div class="col-md-10">
                <input type="text"  name="car_booked" id="name" class="form-control" disabled
                value="<?php echo (isset($_GET['id']) && isset($car)) ? $car : ''; ?>">
                </div>
            </div>
            
            <!-- Date -->
            <div class="form-group">
                <label for="position" class="col-md-2">Date:</label>
                <div class="col-md-10">
                <input type="text"  name="date" id="" class="form-control" required
                value="">
                </div>
            </div>

            <!-- Time -->
            <div class="form-group">
                <label for="position" class="col-md-2">Time:</label>
                <div class="col-md-10">
                <input type="text"  name="time" id="" class="form-control" required
                value="">
                </div>
            </div>
            
           
     
            <!-- Save / Submit button -->
            <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-10">
                    <input type="submit" name="book" value="Book Test Drive" class="btn btn-success">
                </div>
            </div>
        </form> <!-- End form -->
    </div> <!-- End container -->

    <!-- JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
