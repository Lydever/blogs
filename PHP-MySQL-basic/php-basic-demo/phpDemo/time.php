

<?php
//echo date("Y/m/d") . "<br>";
//echo date("Y.m.d") . "<br>";
//echo date(
//    "Y-m-d");

$server = "localhost";
$username = "root";
$password = "";
$database = "register";

//创建连接
$conn = mysqli_connect($server,$username,$password,$database);
//检测连接
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}else{
    echo "连接成功!";
}

//try{
//    $conn = new PDO("mysql:host=$server;",$server,$username,$password,$database);
//    echo "连接成功!";
//}catch(Exception $e){
//    echo $e->getMessage();
//}

//创建数据库
$sql = "CREATE DATABASE db_text";
if(mysqli_query($conn,$sql)){
    echo "创建成功!";
}else{
    echo "Error creating database:".mysqli_error($conn);
}

mysqli_close($conn);


?>