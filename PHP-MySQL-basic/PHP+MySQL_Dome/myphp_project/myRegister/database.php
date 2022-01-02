<?php
$db_connection = null;
function getConnection(){
    $hostname = 'localhost';
    $database = 'register';
    $userName = 'root';
    $password = '';
    global $db_connection;
    $db_connection = @mysqli_connect($hostname,$userName,$password,$database) or die(mysqli_error());
    mysqli_query('set names utf8');
    @mysqli_select_db($db_connection,$database) or die(mysqli_error());
}
function closeConnection(){
    global $db_connection;
    if($db_connection){
        mysqli_close($db_connection) or die(mysqli_error());
    }
}

