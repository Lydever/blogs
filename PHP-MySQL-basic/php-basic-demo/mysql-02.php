  <meta charset="UTF-8">


<?php 


//通过php代码执行一个sql语句得到的查询结果

//1.建立与数据库服务器之间的连接
$connection = mysqli_connect('127.0.0.1','root','','demo');
mysqli_set_charset($connection,'utf8');
if(!$connection){
    //连接数据库失败
	exit('<h1>连接数据库失败</h1>');
}


//基于建立的连接执行一次查询操作  得到查询对象
//这个查询对象可以一行一行拿数据
$query = mysqli_query($connection,'select * from users;');


//取数据
// $row = mysqli_fetch_assoc($query);
// var_dump($row);
// while($row){
// 	echo $row;
//     $row = mysqli_fetch_assoc($query);
// }

//遍历结果集
while ($row = mysqli_fetch_assoc($query)) {
	var_dump($row);
}

