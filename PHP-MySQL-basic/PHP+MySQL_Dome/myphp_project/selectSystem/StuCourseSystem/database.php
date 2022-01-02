<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$dbname="xk";
$link=mysqli_connect("localhost","root","") or die("连接服务器失败");
$db=mysqli_select_db($link,"$dbname") or die("无法连接数据库");
mysqli_query($link,"set names utf8");
?>
</body>
</html>