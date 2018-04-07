<?php
session_start();

if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'user') {
    exit(header('../'));
} else {
    include '../config/dbconfig.php';
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
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/paa.css" type="text/css"/>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <link rel="stylesheet" href="../css/kenn.css" type="text/css"/>
    <link rel="stylesheet" href="../css/custom.css" type="text/css"/>
    <title>Bluff Car Enterprise</title>
</head>
<body>
    <!-- Top navbar -->
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
                <li><a href="#"><?php echo 'Welcome ' . ucfirst($_SESSION['firstname']); ?></a></li>
                <li class=""><a href="#">Home </a></li>
                <li><a href="carindex.php">Showroom</a></li>
                <li><a href="#">Book</a></li>
                <li><a href="#">Rent </a></li>
                <li><a href="#">Order</a></li>
                <li><a href="../php_scripts/logout.php">Logout</a></li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>&nbsp;Gallery </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Car Index</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="../php_scripts/logout.php">Logout</a></li>
                </ul>
                </li>
                <li><a href="#">DATE: <?php echo date('l, F d, Y');?></a></li>
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

    <!-- Carousel -->
    <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mycarousel" data-slide-to="1"></li>
            <li data-target="#mycarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="../assets/images/benz.jpg">
                <div class="carousel-caption">
                    <h1>Benz</h1>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/mclaren1.jpg">
                <div class="carousel-caption">
                    <h1>McLaren F1</h1>
                </div>
            </div>
            <div class="item">
                <img src="../assets/images/BMW-X7.jpg">
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
    <div class="container">
    <div class="jumbotron text-center">
    <h2>Welcome to Bluff Car Enterprise !!!</h2>
    <p><h4>Bluff Enterprise is a company that deals in brand new cars,used cars and car parts. They
    are located in the central district of Accra,Ghana West Africa. It was established mainly to meet
    the needs of customers who do not have the means of buying expensive cars.We also have cars that meet
    the needs of the rich and powerful in the society.We sale luxurious cars, exotic cars,classic cars
    and normal cars</h4></p>
    <button type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-user" style="font-size:30px;"></span> </button>
    <button type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok" style="font-size:30px;"></span> </button>
    </div>
    <div class="row">
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/list_d0611f32-c720-450b-995b-8f7452559080.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Bugatti</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind.</p>
    <button type="button" class="btn btn-sm btn-primary">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/mclaren-p1-gtr.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header1</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-danger">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/bmw.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header2</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-success">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/nice.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header2</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-warning">Purchase</button>
    </div>
    </div>
    </div>

    <br>
    <div class="row">
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/list_d0611f32-c720-450b-995b-8f7452559080.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Bugatti</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-primary">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/mclaren-p1-gtr.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header1</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-danger">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/bmw.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header2</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-success">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/nice.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header2</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <a href="paa.html"><button type="button" class="btn btn-sm btn-warning">Purchase</button></a>
    </div>
    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/list_d0611f32-c720-450b-995b-8f7452559080.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Bugatti</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-primary">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/mclaren-p1-gtr.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header1</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-danger">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/bmw.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header2</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <button type="button" class="btn btn-sm btn-success">Purchase</button>
    </div>
    <div class="col-sm-3">
    <a href="#" class="thumbnail">
    <img src="../assets/images/nice.jpg" alt="Bugatti" style="width:250px;height:180px;">
    </a>
    <h3>Header2</h3>
    <p>The amount of money left in the bank is sufficient to last us for our lifetime. So will
    you marry me Tracy. I need a girl like you in my life to help me chop the money I have
    made so make up your mind. </p>
    <a href="paa.html"><button type="button" class="btn btn-sm btn-warning">Purchase</button></a>
    </div>
    </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
