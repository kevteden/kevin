<?php
try {
    // Grab car details and insert them into the form
    if (isset($_GET['id'])) {
        $query = "SELECT car_id, model, transmission, description, mileage, price FROM tbl_cars WHERE car_id = {$_GET['id']}";
        $car = mysqli_fetch_assoc(mysqli_query($dbhandle, $query));
        echo "<h4>Go ahead, apply your edit then click update</h4>";
    }

    // Save update to the database
    if (isset($_POST['update'])) {
        include '../php_scripts/functions.php';
        
        // Grab post data and sanitize it
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post = array_map('sanitizeVar', $post);
        
        // No field should be empty
        if (empty($post['model']) ||
            empty($post['transmission']) ||
            empty($post['description']) ||
            empty($post['mileage']) ||
            empty($post['price'])
        ) {
            $error = true;
            throw new Exception('FAILED: All fields are required. Including selecting a picture');
        // Mileage and price fields must contain only numbers
        } elseif (!is_string($post['mileage']) || !is_string($post['price'])) {
            $error = true;
            throw new Exception('FAILED: Only numbers allowed for "Mileage" and "Price" fields. No letters allowed');
        } else {
            // Update query
            $query = "UPDATE tbl_cars 
                    SET model = ?, transmission = ?, description = ?, mileage = ?, price = ? 
                    WHERE car_id = ?";
                    
            // Prepared statement
            $prep = mysqli_prepare($dbhandle, $query);

            // Bind parameters
            mysqli_stmt_bind_param(
                $prep,
                "ssssss",
                $post['model'],
                $post['transmission'],
                $post['description'],
                $post['mileage'],
                $post['price'],
                $post['carID']
            );

            // exit(var_dump($post));
            
            // Execute prepared statement
            if (mysqli_stmt_execute($prep)) {
                echo "Your update was successfully saved";
            } else {
                $error = true;
                throw new Exception(mysqli_error($dbhandle));
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
