<?php
session_start();
try {
    include '../config/dbconfig.php';
    include 'functions.php';

    // Sanitize the form data
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $username = sanitizeVar($post['username']);
    $password = sanitizeVar($post['password']);


    // Ensure username and password are not empty
    if (empty($username) || empty($password)) {
        throw new Exception('LOGIN FAILED: Username and password cannot be empty');
    } else {
        // Create a prepared statement
        // Makes queries faster and safer agains SQL injections
        $prep = mysqli_prepare($dbhandle, 'SELECT * FROM tbl_users WHERE username = ?');
        
        // Bind parameters. Parameters are the 'question marks (?)'
        mysqli_stmt_bind_param($prep, 's', $username);
        
        // Run the statement
        mysqli_stmt_execute($prep);
        
        // Fetch the result of the query into variables
        mysqli_stmt_bind_result($prep, $uid, $fn, $ln, $un, $em, $add, $ph, $passHash, $type);
    
        // Fetch details and check to see if user exists
        if (!mysqli_stmt_fetch($prep)) {
            throw new Exception('LOGIN FAILED: User not found');
        
        // Ensure the password the person entered is correct
        } elseif (!password_verify($password, $passHash)) {
            throw new Exception('LOGIN FAILED: Wrong details. Please check username and password');
        } else {
            // Create session variables
            $_SESSION['userid'] = $uid;
            $_SESSION['firstname'] = $fn;
            $_SESSION['lastname'] = $ln;
            $_SESSION['email'] = $em;
            $_SESSION['address'] = $add;
            $_SESSION['phone'] = $ph;
            $_SESSION['type'] = $type;
            
            // Log the user in depending on his/her type
            switch ($_SESSION['type']) {
                case 'admin':
                    exit(header('Location: ../admin/admindash.php'));
                    break;
                case 'user':
                    exit(header('Location: ../user/'));
                    break;
            }
        }
    }
} catch (Exception $e) {
    die($e->getMessage());
} finally {
    mysqli_stmt_close($prep);   // Always close prepared statements
    mysqli_close($dbhandle);    // Always close database connection
}
