<?php
$hostname = 'localhost';
$database = 'xk';
$userName = 'root';
$password = '';
global $conn;
$conn = @mysqli_connect($hostname,$userName,$password)or die(mysqli_error());
mysqli_query($conn,'set names utf8');
@mysqli_select_db($conn,$database) or die(mysqli_error());

?>