<?php
include("datebase.php");
$cid = $_GET['cid'];
$sql = "delete from course where 课程号='$cid' ";
$squery = mysqli_query($connection,$sql);
if($squery){
	echo "<script>alert('删除课程成功!');window.location.href='delete.php';</script>";
}else{
	echo "<script>alert('删除课程失败!');window.location.href='delete.php';</script>";
}