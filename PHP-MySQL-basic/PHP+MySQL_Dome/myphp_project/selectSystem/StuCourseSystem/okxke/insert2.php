<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
include("database.php");
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$credit = $_POST['credit'];
$chour = $_POST['chour'];
$sql="insert into course values('$cid','$cname','$credit','$chour')";
$query=mysqli_query($link,$sql);
if($query){
		echo "<script>alert('添加课程成功!'); window.location.href = 'browse.php';</script>";
		}else{
			echo "<script>alert('添加课程失败!'); window.location.href = 'insert.php';</script>";
}
?>
</body>
</html>