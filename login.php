
<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset = "UTF-8">
<title>Bluff Enterprise</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap/css/custom.css">
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>
<body>
<div class="container">
<br><br><br>
<center><b id="login-name">Login Here</b></center>
<div class="row">
<div class="col-md-6 col-md-offset-3" id="login">

 <form class="form-signin" method="post" action="login_action.php" id="login-form">


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


<div class="form-group">
<label class="user">Username :</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="text1" name="username" placeholder="Enter Username">
</div>
</div>

<div class="form-group">
<label class="user">Password :</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" id="text2" name="password" placeholder="Enter Password">
</div>
</div>
<br>
<div class="form-group">
 <input type="submit" class="btn btn-success" value="Login" name="submit" style="border-radius:0px;">
  <input type="reset" class="btn btn-danger" value="Reset" style="border-radius:0px;">
</div>
<br><br><br>
<a href="#" style="color:white; font-size:15px; float:right">Forgot Password</a>

<a href="signup.php" style="color:white; font-size:20px; float:left">Don't have an account ! Signup Here</a>
</form>
</div>
















	
		
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

