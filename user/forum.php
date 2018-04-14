<?php
session_start();

if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'user') {
    exit(header('Location: ../'));
} else {
    include_once '../config/dbconfig.php';
    $sql = "select * from tbl_cars";
    $result = mysqli_query($dbhandle, $sql);
}


// Script to delete a party
if (isset($_GET['delete'])) {
    include '../php_scripts/delete_car.php';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width,initial-scale = 1">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/paa.css" type="text/css"/>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <link rel="stylesheet" href="../css/kenn.css" type="text/css"/>
    <link rel="stylesheet" href="../css/custom.css" type="text/css"/>
	<link rel="stylesheet" href="../css/forum.css" type="text/css"/>
	<script>
function ajax(){
	
	var req =  new XMLHttpRequest();
	
	req.onreadystatechange = function(){
		
		if (req.readyState == 4 && req.status == 200)
		{
		document.getElementById('chat').innerHTML = req.responseText;	
			
		}
	}
	
	req.open('GET','chat.php',true);
	req.send();
}
setInterval(function(){ajax()},1000);

</script>
    <title>Bluff Car Enterprise</title>
</head>
<body onload="ajax(); ">
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
                    <li class=""><a href="index.php">Home </a></li>
                    <li><a href="carindex.php">Showroom</a></li>
                    <li><a href="bookindex.php">View Bookings</a></li>
                    <li><a href="rentindex.php">View Rentals </a></li>
                    <li><a href="orderindex.php">Order</a></li>
					<li><a href="forum.php">Enter Forum</a></li>
                    <li><a href="../php_scripts/logout.php">Logout</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>&nbsp;Gallery </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Car Index</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="logout.php">Logout</a></li>
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

<?phpinclude_once '../config/db.php';?>
<div id="container">
<div id="chat_box">
<div class="chatlogs">
<div id="chat">
</div>
</div>
</div>
<form action="forum.php" method="post">

<input type="text" name="name" placeholder="enter name"/>
<textarea name="msg" placeholder="enter message"></textarea>
<input type="submit" name="submit" value="Send"/>
</form>

<?php

include_once '../config/db.php';
if (isset($_POST['submit'])){
	
	$name = $_POST['name'];
	$msg = $_POST['msg'];
	
	$insert = "INSERT INTO tbl_forum (name,msg) values ('$name','$msg')";
	$run = $db->query($insert);
	
	if($run){
		echo "<embed loop='false' hidden='true' autoplay='true'>";
	}
}



?>
</div>



<?php mysqli_close($dbhandle); ?>

<!-- JS -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>