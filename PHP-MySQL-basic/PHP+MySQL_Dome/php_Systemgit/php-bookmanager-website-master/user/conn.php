<?php
//数据库中的表名
$user = "user";
$admin = "admin";
$book = "book";
$loan = "loan";

//MYSQL数据库名
$database="bookmanage";

//连接MYSQL数据，输入服务器名、库用户名和密码
$db = @mysql_connect("localhost","root","") or die("不能连接到MySQL");
mysql_select_db($database);

//网页小标题
$title = "图 书 管 理 系 统 ";
//网页名
$webname ="图书管理系统";
//首页显示用户数
$topsize = "5";
//每页显示项目数
$psize = "15";

?>
