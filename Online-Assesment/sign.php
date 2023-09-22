<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$reg = $_POST['reg'];
$email = $_POST['email'];
$title = $_POST['title'];
$code = $_POST['code'];
$password = $_POST['password'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$reg = stripslashes($reg);
$reg = addslashes($reg);
$email = stripslashes($email);
$email = addslashes($email);
$title= stripslashes($title);
$title= addslashes($title);
$code = stripslashes($code);
$code = addslashes($code);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$reg' , '$title','$email' ,'$code', '$password')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

header("location:account.php?q=1");
}
else
{
header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>