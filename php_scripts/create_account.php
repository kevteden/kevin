<?php
try {
    include './config/dbconfig.php';
    include './php_scripts/functions.php';

    if (isset($_POST['submit'])) {
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
        } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $error = true;
            throw new Exception('You entered an invalid email format');
        } elseif ($post['password'] === $post['username']) {
            $error = true;
            throw new Exception('You cannot use your username as your password');
        } elseif ($post['password'] === $post['firstname'] || $post['password'] === $post['lastname']) {
            $error = true;
            throw new Exception('You cannot use any of your names as your password');
        } elseif (strlen($post['password']) < 6) {
            $error = true;
            throw new Exception('Password must be at least 6 characters long');
        } elseif ($post['password'] !== $post['confirm']) {
            $error = true;
            throw new Exception('Passwords do not match');
        } elseif (!is_numeric($post['phone'])) {
            $error = true;
            throw new Exception('Only numbers allowed for phone number');
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
    }
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    closeConnections($prep, $dbhandle);
}
