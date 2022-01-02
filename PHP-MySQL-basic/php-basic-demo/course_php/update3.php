 
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <title>修改</title>  
</head>
<body> 

<?php
 include("database.php");
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$xfen = $_POST['xfen'];
$xshu = $_POST['xshu'];

$sql = "update course set 课程号='$cid',课程名='$cname',学分=$xfen,学时数=$xshu where 课程号='$cid'";
$res = mysqli_query($connection,$sql);
if($res){
  echo "<script>alert('修改课程成功!'); 
  window.location.href='browse.php';
  </script>";
}else{
   echo "<script>alert('修改课程失败!'); 
  window.location.href='browse.php';
  </script>";
}
?>

</body>  
</html>