<?php
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSave'])) {
        include '../php_scripts/functions.php';
        include '../config/dbconfig.php';

        // Grab post data
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $post = array_map('sanitizeVar', $post);

        if (empty($post['model']) ||
            empty($post['transmission']) ||
            empty($post['description']) ||
            empty($post['mileage']) ||
            empty($post['price'])
        ) {
            $error = true;
            throw new Exception('UPLOAD FAILED: All fields are required');
        }
        
        // Grab particulars of uploaded file
        $imgName  = uniqid('carImg_', true); // Generate a unique name for each uploaded file
        $imgExt   = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION); // Very trivial
        $imgSize  = $_FILES['myfile']['size'];
        $imgError = $_FILES['myfile']['error'];
        $imgTmp   = $_FILES['myfile']['tmp_name'];
        $destination  =  "../admin/uploads/{$imgName}.{$imgExt}";
        $finfo   = new finfo(FILEINFO_MIME_TYPE);   // Grab the mime type of the file.
        @$imgMime = $finfo->file($imgTmp);          // <-- '@' Error suppressor here. Watch out
        
        // Restrictions
        $allowedExt   = ['jpg', 'jpeg', 'png', 'gif'];
        $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        
        // Validation of the file can now begin
        // Check if anything is uploaded in the first place
        if ($imgError === 4) {
            $error = true;
            throw new Exception(
                'UPLOAD FAILED: No image uploaded. You have to choose an image'
            );

        // Check the extension of the file. Not really necessary
        } elseif (!in_array($imgExt, $allowedExt)) {
            $error = true;
            throw new Exception(
                'UPLOAD FAILED: NOT A VALID IMAGE <br>
                Only jpg, jpeg, png or gif allowed'
            );

        // Check mime type of image using finfo class.
        } elseif (!in_array($imgMime, $allowedMimes)) {
            $error = true;
            throw new Exception(
                'UPLOAD FAILED: NOT A VALID IMAGE <br>
                Only jpg, jpeg, png or gif allowed'
            );

        // Check mime type using GD library.
        } elseif (!getimagesize($imgTmp)) {
            $error = true;
            throw new Exception(
                'UPLOAD FAILED: NOT A VALID IMAGE <br>
                Only jpg, jpeg, png or gif allowed'
            );

        // Ensure the picture is not above size limit. 5MB
        } elseif ($imgSize > 5000000) {
            $error = true;
            throw new Exception(
                'UPLOAD FAILED: IMAGE SIZE TOO BIG <br>
                Maximum of 5MB allowed. Current size: ' . $imgSize
            );

        // Check if the file already exists on the server. Trivial in some situations
        } elseif (file_exists($destination)) {
            $error = true;
            throw new Exception(
                'UPLOAD FAILED: FILE ALREADY EXISTS <br>
                The file you are attempting to upload seems to have been uploaded already'
            );
        } else {
            if (is_uploaded_file($imgTmp)) {
                // Remove executable permissions on the file.
                if (!chmod($imgTmp, 0644)) {
                    // This exception is perhaps not necessary for the user to see. Consider what you can do here.
                    $error = true;
                    throw new Exception('UPLOAD FAILED: Could not change file permissions');
                }
                
                if (@move_uploaded_file($imgTmp, $destination)) { // <-- '@' Error suppressor here. Watch out
                    // Insert statement
                    $query = 'INSERT INTO tbl_cars (model, transmission, description, mileage, photo, price, user_id)
                        VALUES (?, ?, ?, ?, ?, ?, ?)';

                    // Create prepared statement
                    $prep = mysqli_prepare($dbhandle, $query);
                    
                    // Bind parameters
                    $userid = (int)$_SESSION['userid'];
                    $destination = "{$imgName}.{$imgExt}";
                    mysqli_stmt_bind_param(
                        $prep,
                        'ssssssi',
                        $post['model'],
                        $post['transmission'],
                        $post['description'],
                        $post['mileage'],
                        $destination,
                        $post['price'],
                        $userid
                    );

                    if (mysqli_stmt_execute($prep)) {
                        echo 'SUCCESS: Your image was successfully uploaded!';
                    } else {
                        $error = true;
                        throw new Exception('UPLOAD FAILED: '. mysqli_error($dbhandle));
                    }
                } else {
                    $error = true;
                    throw new Exception(
                        'UPLOAD FAILED: COULD NOT MOVE YOUR FILE <br>
                        Perhaps the destination folder does not exist
                        or you don\'t have permission to write to that folder <br>'
                    );
                }
            } else {
                $error = true;
                // This just a bluff. You might want to do something else here.
                throw new Exception(
                    'WARNING: MALICIOUS ACTIVITY DETECTED <br>
                    Upload a picture using only the form.<br> Your IP has been recorded!'
                );
            }
        }
    } else {
        header('Location: ./');
    }
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    @closeConnections($prep, $dbhandle);
}
