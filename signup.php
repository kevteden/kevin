

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
<br>
<center><b id="login-name">Register Here</b></center>
<div class="row">
<div class="col-md-6 col-md-offset-3" id="login">

 <form method="post" action="insert.php" class="form-signin">		
<div class="form-group">
<label class="user">Enter First Name</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="text1" name="firstname" placeholder="Enter First Name" value="" />
</div>
</div>		

<div class="form-group">
<label class="user">Enter Last Name</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="text1" name="lastname" placeholder="Enter Last Name" value="" />
</div>
</div>

<div class="form-group">
<label class="user">Enter Username</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="text1" name="username" placeholder="Enter Username" value="" />
</div>
</div>

<div class="form-group">
<label class="user">Enter Email</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="text1" name="email" placeholder="Enter Email" value="" />
</div>
</div>

<div class="form-group">
<label class="user"> Enter Address</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" id="text1" name="address" placeholder="Enter Address" value="<?php if(isset($error)){echo $add;}?>" />
</div>
</div>
<div class="form-group">
<label class="user"> Enter Phone Number</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="number" class="form-control" id="text1" name="phone" placeholder="Enter Phone Number">
</div>
</div>
<div class="form-group">
<label class="user">Enter Password</label>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" id="text1" name="password" placeholder="Enter Password">
</div>
</div>

<br>
<div class="form-group">
 <input type="submit" class="btn btn-success" value="Signup" name="submit" style="border-radius:0px;">
  <input type="reset" class="btn btn-danger" value="Reset" style="border-radius:0px;">
</div>
<br><br><br>
<a href="login.php" style="color:white; font-size:20px; float:left">Have an account Already! Login</a>
</form>



</div>

















<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>