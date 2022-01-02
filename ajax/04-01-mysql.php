  <meta charset="UTF-8">

<?php

//1.建立与数据库服务器之间的连接
$connection = mysqli_connect('127.0.0.1','root','','management');


if(!$connection){
	die('MySQL服务器连接失败!');
}else{
	echo 'MySQL服务器连接成功!';
}
echo'<br>';


// $db_selected = mysqli_select_db($connection,'managment');
// if(!$db_selected){
// 	die('MySQL数据库连接失败!');
// }else{
// 	echo 'MySQL数据库连接成功!';
// }


//设置字符集
mysqli_set_charset($connection,'utf8');
//设置字符集的第二个方法
$res = mysqli_query($connection,'set names utf8');
echo $res;


$query = mysqli_query($connection,'select * from student;');
//取每行数据
// $row = mysqli_fetch_assoc($query);
// var_dump($row);

//遍历结果集
while($row = mysqli_fetch_assoc($query)){
	var_dump($row);
}