<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['submit'])) {
    try {
        include './config/dbconfig.php';
        include './php_scripts/functions.php';
    
        // Get the $_POST array. Sanitize each element.
        // Store it inside $post variable making it also an array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Get each element of the post array and sanitize it with the sanitizeVar function
        $post = array_map('sanitizeVar', $post);
    
        // Create a prepared statement. Makes queries faster and safer against SQL injections
        $prep = mysqli_prepare($dbhandle, 'SELECT * FROM tbl_users WHERE username = ?');
        
        // Make username lowercase. Ensures case insensitivity
        $post['username'] = strtolower($post['username']);
        
        // Ensure username and password are not empty
        if (empty($post['username']) || empty($post['password'])) {
            $error = true;
            throw new Exception('LOGIN FAILED: Username and password cannot be empty');
        } else {
            // Bind parameters. Parameters are the 'question marks (?)' in the prepared statement
            mysqli_stmt_bind_param($prep, 's', $post['username']);
            
            // Execute the prepared statement
            mysqli_stmt_execute($prep);
            
            // Fetch the result of the query into variables
            mysqli_stmt_bind_result($prep, $userID, $firstname, $lastname, $userName, $email, $address, $phone, $passHash, $type);
        
            // Fetch details and check to see if user exists
            if (!mysqli_stmt_fetch($prep)) {
                $error = true;
                throw new Exception('LOGIN FAILED: Username not found');
            
            // Ensure the password the person entered is correct
            } elseif (!password_verify($post['password'], $passHash)) {
                $error = true;
                throw new Exception('LOGIN FAILED: Make sure you entered the right password');
            } else {
                // Create session variables
                $_SESSION['type']      = $type;
                $_SESSION['phone']     = $phone;
                $_SESSION['email']     = $email;
                $_SESSION['userid']    = $userID;
                $_SESSION['address']   = $address;
                $_SESSION['lastname']  = $lastname;
                $_SESSION['firstname'] = $firstname;
                
                // If there is no error then log the user in depending on his/her access type
                if (empty($error)) {
                    switch ($_SESSION['type']) {
                        case 'admin':
                            closeConnections($prep, $dbhandle); // Close prepared statement and database connection
                            exit(header('Location: ./admin/admindash.php'));
                            break;
                        case 'user':
                            closeConnections($prep, $dbhandle); // Close prepared statement and database connection
                            exit(header('Location: ./user/'));
                            break;
                    }
                }
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        closeConnections($prep, $dbhandle); // Close prepared statement and db connection
    }
} else {
    exit(header('Location: ../')); // Get out of this file if its requested illegally
}
