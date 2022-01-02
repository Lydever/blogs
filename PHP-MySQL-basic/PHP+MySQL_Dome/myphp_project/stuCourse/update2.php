<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>浏览</title>
</head>
<body>
<script language="javascript">
function check(form){
	if(form.cid.value==""){
		alert("请输入课程号!");form.cid.focus();return false;
	}
	if(form.cname.value==""){
		alert("请输入课程名!");form.cname.focus();return false;
	}
	if(form.credit.value==""){
		alert("请输入学分!");form.credit.focus();return false;
	}
	if(form.chour.value==""){
		alert("请输入学时数!");form.chour.focus();return false;
	}
}
</script>
<?php
include ("database.php");
$cid = $_GET['cid']; 
$sql="select * from  course where 课程号='$cid'"; 
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result)
?>
<form method="post" action="update3.php">
<p>请输入需要修改的课程信息：</p>
课程号：<input type="text" id="cid" name="cid" value="<?php echo $row['课程号'] ?>" size="8"/> 
课程名:
<input type="text" id="cname" name="cname" value="<?php echo $row['课程名'] ?>" size="20"/> 
学分：
<input type="text" id="credit" name="credit" value="<?php echo $row['学分'] ?>" size="8" /> 
学时数：
<input type="text" id="chour" name="chour"  value="<?php echo $row['学时数'] ?>" size="8" /> 
<input type="submit" value="提交" onClick="return check(form);"/>
</body>
</html>