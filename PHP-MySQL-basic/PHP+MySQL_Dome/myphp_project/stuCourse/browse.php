<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>浏览</title>
</head>
<body>
<p align="center">操作菜单</p>
<p align="center">
<a href="browse.php" target="_blank">浏览</a>
<a href="insert.php" target="_blank">添加</a>
<a href="delete.php" target="_blank">删除</a>
<a href="update.php" target="_blank">修改</a>
<?php
include ("database.php");
$sql="select * from  course";
$result=mysqli_query($link,$sql);
echo "<table width='300' border='1' cellspacing='0' align='center'>";
echo "<tr height='25'><td align='center'>课程号</td><td align='center'>课程名</td><td align='center'>学分</td><td align='center'>学时数</td></tr>";
while($row=mysqli_fetch_array($result)){
	echo "<tr height='25'>";
	echo "<td align='center'>".$row['课程号']."</td>";
	echo "<td align='center'>".$row['课程名']."</td>";
	echo "<td align='center'>".$row['学分']."</td>";
	echo "<td align='center'>".$row['学时数']."</td>";
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>