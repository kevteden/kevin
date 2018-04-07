<?php
session_start();
include_once '../config/dbconfig.php';
$sql = "select * from tbl_cars";
$result = mysqli_query($dbhandle, $sql);

// Script to delete a party
include '../php_scripts/delete_car.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width,initial-scale = 1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/paa.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/kenn.css" type="text/css"/>
    <link rel="stylesheet" href="css/custom.css" type="text/css"/>
    <title>Bluff Car Enterprise</title>
</head>
<body>
    <!-- Start navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">BLUFF CAR</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class=""><a href="admindash.php">Home </a></li>
                    <li><a href="carindex.php">Showroom</a></li>
                    <li><a href="#">Book</a></li>
                    <li><a href="#">Rent </a></li>
                    <li><a href="#">Order</a></li>
                    <li><a href="../php_scripts/do_logout.php">Logout</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>&nbsp;Gallery </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Car Index</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="do_logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input class="form-control" type="text" name="search" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                </ul>
            </div>
        </div>
    </nav> <!-- End navbar -->

    <!-- Start carousel -->
    <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mycarousel" data-slide-to="1"></li>
            <li data-target="#mycarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/benz.jpg">
                <div class="carousel-caption">
                <h1>Benz</h1>
                </div>
            </div>

            <div class="item">
                <img src="images/mclaren1.jpg">
                <div class="carousel-caption">
                <h1>McLaren F1</h1>
                </div>
            </div>

            <div class="item">
                <img src="images/BMW-X7.jpg">
                <div class="carousel-caption">
                <h1>2018 BMW-X7</h1>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div> <!-- End carousel -->
<br/>

<!-- Start page content -->
<div class="container">
    <div class="page-header">

    <h3>Add New
    <a class="btn btn-default" href="carmod.php">
    <span class="glyphicon glyphicon-plus"></span>&nbsp;Add New
    </a>
    </h3>
    <!-- Start table to display cars -->
    <table id="car_data" class="table table-bordered table-striped table-responsive">
        <thead>
            <tr>
            <th>Model</th>
            <th>Transmission</th>
            <th>Description</th>
            <th>Mileage</th>
            <th>Price</th>
            <th>Car Image</th>
            <th>Action</th>
            </tr>
        </thead>
    <tbody>
    <?php
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?php echo $row['model']?></td>
        <td><?php echo $row['transmission']?></td>
        <td><?php echo $row['description']?></td>
        <td><?php echo $row['mileage']?></td>
        <td><?php echo $row['price']?></td>
        <td><img src="./uploads/<?php echo $row['photo'] ?>" alt="car_image" height="120px" width="170px"></td>
        <td>
            <a class="btn btn-info btn-sm"href="booking.php?id=<?php echo $row['car_id']?>"><span class="glyphicon glyphicon-order"></span>Book</a>
            <a class="btn btn-info btn-sm"href="edit.php?id=<?php echo $row['car_id']?>"><span class="glyphicon glyphicon-edit"></span>Edit</a>
            <a class="btn btn-danger btn-sm"href="carindex.php?delete=<?php echo $row['car_id'];?>&img=<?php echo $row['photo'];?>" onclick="return confirm('Are you sure you want to delete this record?')"><span class="glyphicon glyphicon-remove-circle"></span>Delete</a>
        </td>
    </tr>
    <?php
    }
    } else {
        echo "<p>No cars available at the moment</p>";
    }
    ?>
    </tbody>
    </table> <!-- End table displaying cars -->
    </div>
</div>

<?php mysqli_close($dbhandle); ?>

<!-- JS -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>