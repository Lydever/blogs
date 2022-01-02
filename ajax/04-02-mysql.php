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


$sql = mysqli_query($connection,'insert into student(学号,姓名) values(2009010101,"张三")');
if($sql){
	echo '插入数据成功!';
}else{
	echo '插入数据失败!';
}

$sql2 = mysqli_query($connection,'update student set 性别 = "女",专业 = "软件技术" where 姓名 = "张三"');
if($sql2){
	echo '修改数据成功!';
}else{
	echo '修改数据失败!';
}

$sql3 = mysqli_query($connection,'delete from student where 专业 = "电子商务"');
if($sql3){
	echo '修改数据成功!';
}else{
	echo '修改数据失败!';
}