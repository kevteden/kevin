<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $img = $_GET['img'];
    var_dump($id, $img);
    if (mysqli_query($dbhandle, "DELETE FROM tbl_cars WHERE car_id = $id")) {
        if (unlink("../admin/uploads/$img")) {
            header("location: carindex.php");
            exit;
        }
    }
}
