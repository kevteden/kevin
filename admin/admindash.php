<?php
session_start();
// Send the user back to the login page if the user has not logged in.
// Also if the user is not an admin send the person out of this file.
if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'admin') {
    header('Location: ../');
    exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bluff Enterprise</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admindash.php"> Bluff Enterprise</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> DATE:  <?php echo date('l, F d, Y');?> &nbsp; <a href="../php_scripts/logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/me.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="admindash.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="./carindex.php"><i class="fa fa-desktop fa-2x"></i>Showroom</a>
                    </li>
                    <li>
                        <a  href="./carmod.php"><i class="fa fa-user fa-2x"></i>Add New Car</a>
                    </li>
						   <li  >
                        <a   href="chart.html"><i class="fa fa-user fa-2x"></i> Forum</a>
                    </li>	
                      <li  >
                        <a  href="carindex.php"><i class="fa fa-user fa-2x"></i> View Car</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-2x"></i> Book </a>
                    </li>				
					
					                   
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-2x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-2x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h4>Welcome,  <?php echo ucfirst($_SESSION['firstname']); ?></h4>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">120 New</p>
                    <p class="text-muted">Messages</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">30 Tasks</p>
                    <p class="text-muted">Remaining</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">240 New</p>
                    <p class="text-muted">Notifications</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">3 Orders</p>
                    <p class="text-muted">Pending</p>
                </div>
             </div>
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />                
            
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
              
          
           
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
