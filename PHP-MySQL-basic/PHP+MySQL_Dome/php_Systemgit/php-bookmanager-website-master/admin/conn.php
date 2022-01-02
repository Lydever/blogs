<?php
//数据库中的表名
$user = "user";
$admin = "admin";
$book = "book";
$loan = "loan";

//MYSQL数据库名
$database="bookmanage";

//连接MYSQL数据，需提供服务器名、库用户名和密码
$db = @mysql_connect("localhost","root","root") or die("不能连接到MySQL");
mysql_select_db($database);

$title = "图 书 管 理 系 统 ";

$webname ="图书管理系统";
//首页显示用户数
$topsize = "5";
//每页显示项目数量
$psize = "15";
?>