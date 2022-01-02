 <meta charset="UTF-8">

<?php

$connection = mysqli_connect('localhost','root','') or die('mysql连接服务器失败!');
$db_selected = mysqli_select_db($connection,'management') or die('mysql数据库连接失败');
mysqli_query($connection,'set names utf8');