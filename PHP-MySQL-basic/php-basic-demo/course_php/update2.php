<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <title>修改</title>  
</head>
<body>

<script language="javascript">
  function check(form){
    if (form.cid.value="") {
      alert("请输入课程号!");
      form.cid.focus();
      return false;
    }
     if (form.cname.value="") {
      alert("请输入课程名!");
      form.cname.focus();
      return false;
    }
     if (form.xfen.value="") {
      alert("请输入学分!");
      form.xfen.focus();
      return false;
    }
     if (form.xshu.value="") {
      alert("请输入学时数!");
      form.xshu.focus();
      return false;
    }
  }
</script>
<?php 
include ("database.php");
$cid = $_GET['cid'];
$sql = "select * from course where 课程号='$cid'";
$res = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($res);
?>
<form action="update3.php.php" method="post">  
  <p>请输入需要修改的课程信息:</p>
    <label>课程号：</label><input type="text" name="cid" id="cid" value="<?php echo $row['课程号'] ?>" />  
    <label>课程名：</label><input type="text" name="cname" id="cname" value="<?php echo $row['课程名']?>" />  
    <label>学分：</label><input type="text" name="xfen" id="xfen" value="<?php echo $row['学分']?>" />  
    <label>学时数：</label><input type="text" name="xshu" id="xshu" value="<?php echo $row['学时数']?>" /> 
    <input type="submit" value="提交" onClick="return check(form);"/>  

</form> 
</body>  
</html>




