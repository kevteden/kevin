<?php
try {
    if (isset($_POST['submit'])) {
        include './config/dbconfig.php';
        include './php_scripts/functions.php';

        // Sanitize the post array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post = array_map('sanitizeVar', $post);

        // Grab all form details and sanitize them
        $post['username']  = strtolower($post['username']); // Make username lowercase. Ensures case insensitivity
        $post['email']     = filter_var($post['email'], FILTER_SANITIZE_EMAIL);

        // Create a prepared statement
        // Protects against SQL injections and makes queries faster
        $query = "INSERT INTO tbl_users (firstname, lastname, username, email, address, phone, password)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Create prepared statement
        $prep = mysqli_prepare($dbhandle, $query);

        // Validate all inputs
        if (empty($post['firstname']) ||
            empty($post['lastname'])  ||
            empty($post['username'])  ||
            empty($post['email'])     ||
            empty($post['address'])   ||
            empty($post['phone'])     ||
            empty($post['password'])  ||
            empty($post['confirm'])
        ) {
            $error = true;
            throw new Exception('All fields are required');
        // Make sure email is valid
        } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $error = true;
            throw new Exception('You entered an invalid email format');
        // Make sure the user does not use their username as password
        } elseif ($post['password'] === $post['username']) {
            $error = true;
            throw new Exception('You cannot use your username as your password');
        // Make sure the person does not user any of their names as password
        } elseif ($post['password'] === $post['firstname'] || $post['password'] === $post['lastname']) {
            $error = true;
            throw new Exception('You cannot use any of your names as your password');
        // Make sure password is at least 6 characters long
        } elseif (strlen($post['password']) < 6) {
            $error = true;
            throw new Exception('Password must be at least 6 characters long');
        // Make sure the passwords are the same
        } elseif ($post['password'] !== $post['confirm']) {
            $error = true;
            throw new Exception('Passwords do not match');
        // Make sure phone number contains only numbers
        } elseif (!is_numeric($post['phone'])) {
            $error = true;
            throw new Exception('Only numbers allowed for phone number');
        // Make sure the supplied phone number is exactly 10 digits long
        } elseif (strlen($post['phone']) !== 10) {
            $error = true;
            throw new Exception('Phone must be exactly 10 digits');
        } else {
            // Hash the password
            $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
            
            // Bind parameters
            mysqli_stmt_bind_param(
                $prep,
                'sssssss',
                $post['firstname'],
                $post['lastname'],
                $post['username'],
                $post['email'],
                $post['address'],
                $post['phone'],
                $post['password']
            );

            // Execute and save details to database
            if (mysqli_stmt_execute($prep)) {
                echo "<p>
                Your accout was successfully created<br>
                Proceed to <a href='./'>Login page</a> and login with your username and password
                </p>";
            } else {
                $error = true;
                throw new Exception(mysqli_error($dbhandle));
            }
        }
    } else {
        // Go to index page if this file is requested illegally
        exit(header('Location: ../'));
    }
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    // Close database and prepared statements
    closeConnections($prep, $dbhandle);
}
