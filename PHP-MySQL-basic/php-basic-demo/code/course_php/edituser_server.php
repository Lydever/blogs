<?php 
require "database.php";


// 获取修改的信息
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$xfen = $_POST['xfen'];
$xshu = $_POST['xshu'];
// 更新数据
$sql = "UPDATE news SET 课程号='$cid',课程名='$cname',学分='$xfen',学时数='$xshu',WHERE 课程号=$cid";
mysql_query($connection,$sql) or die('修改课程失败：'.mysql_error()); 
header("Location:edituser.php"); 