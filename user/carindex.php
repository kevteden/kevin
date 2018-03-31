<?php
$tbl_users="tbl_users"; 
session_start();
$username = '';
include_once '../dbconfig.php';

?>

<!DOCTYPE html>
<html>
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
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="css/paa.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/kenn.css" type="text/css"/>
<title>Bluff Car Enterprise</title>
</head>

<body>
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
<li class=""><a href="index.php">Home </a></li>
<li><a href="carindex.php">Showroom</a></li>
<li><a href="#">Book</a></li>
<li><a href="#">Rent </a></li>
<li><a href="#">Order</a></li>
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
</nav>
<div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
<ol class="carousel-indicators">
<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
<li data-target="#mycarousel" data-slide-to="1"></li>
<li data-target="#mycarousel" data-slide-to="2"></li> 
</ol>
<div class="carousel-inner">
<div class="item active">
<img src="images/martin0.jpg">
<div class="carousel-caption">
<h1>Austin Martin</h1>
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
</div>
<br/>



















 <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>