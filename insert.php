<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

$username = '';

include_once 'dbconfig.php';

if(isset($_POST['submit'])){

$tbl_users="tbl_users"; 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$result = mysqli_query($dbhandle, "INSERT INTO $tbl_users (firstname,lastname,username,email,address,phone,password) VALUES ('$firstname','$lastname','$username','$email','$address','$phone','$password')");

if($result===TRUE)

{
echo "<script>alert('User Account has been saved in the database.');
						window.location='login.php';
						</script>";
}						
else
{
  echo"The query did not run";
 
}
}
mysqli_close($result);



?>
