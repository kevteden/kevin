<?php
if (isset($_GET['delete'])) {
    if (mysqli_query($dbhandle, "DELETE FROM tbl_cars WHERE car_id = {$_GET['delete']}")) {
        if (unlink("../admin/uploads/{$_GET['img']}")) {
            header("location: carindex.php");
            exit;
        }
    }
} else {
    exit(header('Location: ../'));
}
