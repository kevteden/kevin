<?php
session_start();
// Send the user back to the login page if the user has not logged in.
// Also if the user is not an admin send the person out of this file.
if (!isset($_SESSION['type']) && $_SESSION['type'] !== 'admin') {
    header('Location: ../');
    exit;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/paa.css" type="text/css"/>
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <link rel="stylesheet" href="../css/kenn.css" type="text/css"/>
    <link rel="stylesheet" href="../css/custom.css" type="text/css"/>
    <title>Bluff Car Enterprise</title>
</head>
<body>
    <!-- Start navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="col">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">AdminStrap </a>
            </div>
            
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="active"><a href="admindash.php">Dashboard</a></li>
                <li><a href="carindex.php">Showroom</a></li>
                <li><a href="post.html">Posts</a></li>
                <li><a href="users.html">Users</a></li>
                <li><a href="./carindex.php">View cars</a></li>
                <li><a href="./carmod.php">Add a new car</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html">Welcome, <?php echo ucfirst($_SESSION['firstname']); ?></a></li>
                <li><a href="../php_scripts/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav> <!-- End navbar -->

    <!-- Start header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
                </div>
                <div class="col-md-2">
                    <div class="dropdown create">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="col">
                            Create Content <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdown-Menu1">
                            <li><a href="#">Add Page</a></li>
                            <li><a href="#">Add Post</a></li>
                            <li><a href="#">Add User</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header> <!-- End header -->

    <!-- Start breadcrumbs -->
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section> <!-- End breadcrumbs -->

    <!-- Start main section -->
    <section id="main">
        <div class="container"> <!-- Container -->
            <div class="row"> <!-- Row -->
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="index.html" class="list-group-item active main-color-bg">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                        </a>
                        <a href="pages.html" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pages <span class="badge">12</span></a>
                        <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge">33</span></a>
                        <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User <span class="badge">203</span></a>
                    </div>
                    
                    <div class="well">
                        <h4>Disk Space Used</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progress-bar" aria-valuenow="60" aria-valluemin="0" aria-valuemax="100" style="width:60%">
                            60%
                            </div>
                        </div>
                        <h4>Bandwith Used</h4>
                        <div class="progress">
                            <div class="progress-bar" role="progress-bar" aria-valuenow="60" aria-valluemin="0" aria-valuemax="100" style="width:40%">
                            40%
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title">Website Overview</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <div class="well dash-box">
                                <h2> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 203</h2>
                                <h4>Users</h4>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="well dash-box">
                                <h2> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 12</h2>
                                <h4>Pages</h4>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="well dash-box">
                                <h2> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                                <h4>Posts</h4>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="well dash-box">
                                <h2> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                                <h4>Visitors</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Latest Users</h3></div>
                        <div class="panel-body">Panel Content</div>
                    </div>

                </div>
                </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- End main section -->
    
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
