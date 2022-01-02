 
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <title>添加</title>  
</head>
<body> 

<?php
   require "database.php";
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$xfen = $_POST['xfen'];
$xshu = $_POST['xshu'];

$sql = "insert into course values('$cid','$cname','$xfen','$xshu')";
$res = mysqli_query($connection,$sql);
if($res){
  echo "<script> 
  alert('添加课程成功!'); 
  window.location.href='browse.php';
  </script>";
}else{
   echo "<script> 
  alert('添加课程失败!'); 
  window.location.href='browse.php';
  </script>";
}
?>

</body>  
</html>