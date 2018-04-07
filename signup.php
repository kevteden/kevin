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
    <title>Sign up - Bluff Enterprise</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/custom.css">
    <link rel="stylesheet" href="./assets/bootstrap/js/bootstrap.min.js">
</head>
<body>
    <div class="container">
    <center><b id="login-name">Register Here</b></center>
    <br>

    <div class="row">
    <div class="col-md-6 col-md-offset-3" id="login">
    
        <!-- Start form -->
        <form method="post" action="signup.php" class="form-signin">

            <!-- Include PHP script for the login form -->   
            <?php if (isset($_POST['submit'])) { ?> 
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-info">
                        <strong><?php include './php_scripts/create_account.php'; ?></strong>
                    </span>
                </div>
            <?php } else {
                echo "<p style='color: #fff; text-decoration: underline;text-align:center;'>Please be aware: All fields are required</p>";
            } ?>
            <!-- End inclusion of PHP script -->
            

            <!-- First name -->
            <div class="form-group">
                <label class="user">Enter First Name</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" id="text1" name="firstname" 
                    placeholder="Enter First Name" required value="<?php echo (isset($error)) ? $post['firstname'] : ''; ?>"/>
                </div>
            </div>

            <!-- Last name -->
            <div class="form-group">
                <label class="user">Enter Last Name</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="text1" name="lastname"
                placeholder="Enter Last Name" required value="<?php echo (isset($error)) ? $post['lastname'] : ''; ?>"/>
                </div>
            </div>

            <!-- Username -->
            <div class="form-group">
                <label class="user">Enter Username</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="text1" name="username"
                placeholder="Enter Username" required value="<?php echo (isset($error)) ? $post['username'] : ''; ?>"/>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label class="user">Enter Email</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="text1" name="email"
                placeholder="Enter Email" required value="<?php echo (isset($error)) ? $post['email'] : ''; ?>"/>
                </div>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label class="user"> Enter Address</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="text1" name="address"
                placeholder="Enter Address" required value="<?php echo (isset($error)) ? $post['address'] : ''; ?>"/>
                </div>
            </div>

            <!-- Phone number -->
            <div class="form-group">
                <label class="user"> Enter Phone Number (10 digits only)</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="text" class="form-control" pattern="{10}" title="Numbers only. 10 digits long" id="text1"
                name="phone" placeholder="Enter Phone Number" required value="<?php echo (isset($error)) ? $post['phone'] : ''; ?>">
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="user">Enter Password (At least 6 chars)</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" id="text1" name="password"
                placeholder="Enter Password" required value="<?php echo (isset($error)) ? $post['password'] : ''; ?>">
                </div>
            </div>

            <!-- Confirm password -->
            <div class="form-group">
                <label class="user">Confirm Password</label>
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" id="text1" name="confirm"
                placeholder="Enter Password" required value="<?php echo (isset($error)) ? $post['password'] : ''; ?>">
                </div>
            </div>
            <br>
            
            <!-- Login buttons -->
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Signup" name="submit" style="border-radius:0px;">
                <input type="reset" class="btn btn-danger" value="Reset" style="border-radius:0px;">
            </div>
            <br>
            <br>
            
            <!-- Link to login page -->
            <a href="./" style="color:white; font-size:20px; float:left">Have an account Already! Login</a>
        </form> <!-- End form -->
    </div>

    <!-- JS -->
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>