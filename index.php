<?php
session_start();

// Redirect the user if they have already logged in
if (isset($_SESSION['type'])) {
    switch ($_SESSION['type']) {
        case 'user':
            exit(header('Location: ./user/'));
            break;
        case 'admin':
            exit(header('Location: ./admin/admindash.php'));
            break;
    }
}
?>
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
        <br>
           
        <center><b id="login-name">Login Here</b></center>
        <br>
        <br>
        
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="login">

                <!-- Login form starts -->
                <form class="form-signin" method="post" action="index.php" id="login-form">
                
                <!-- Include PHP script for the login form -->   
                <?php if (isset($_POST['submit'])) { ?> 
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-info">
                            <strong><?php include './php_scripts/login_action.php';?></strong>
                        </span>
                    </div>
                    <?php } ?>
                    <!-- End inclusion of PHP script -->

                    <!-- Username -->
                    <div class="form-group">
                        <label class="user">Username :</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="text1" name="username" placeholder="Enter Username" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label class="user">Password :</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" id="text2" name="password" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <br>
                    
                    <!-- Submit buttons  -->
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Login" name="submit" style="border-radius:0px;">
                        <input type="reset" class="btn btn-danger" value="Reset" style="border-radius:0px;">
                    </div>
                    <br>
                    <br>
                    <br>
                    
                    <!-- Link to signup page -->
                    <a href="signup.php" style="color:white; font-size:20px; float:left">Don't have an account ! Signup Here</a>
                </form> <!-- Login form ends -->
            </div>
        </div>
    </div>
    
    <!-- JS -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
