 
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <title>添加</title>  
</head>
<body>
<form action="add.php" method="post">  
    <label>课程号：</label><input type="text" name="cid">  
    <label>课程名：</label><input type="text" name="cname">  
    <label>学分：</label><input type="text" name="xfen">  
    <label>学时数：</label><input type="text" name="xshu"> 
    <input type="button" value="添加">  
</form> 

<?php
   require "database.php";

  function get_str($str){
    $val = ($_POST[$str])?$_POST[$str]:null;
    return $val;
}
   $cid = get_str("cid");//接收输入的数据
   $cname = get_str("cname");
   $xfen = get_str("xfen");
   $xshu = get_str("xshu");
   if($cid==0){
    ?>
    <script type="text/javascript">
      alert("请输入课程号");
      window.location.href="add.php";
    </script>
    <?php
   }


// 插入数据
   $sql = "INSERT INTO course(课程号,课程名,学分,学时数) VALUES ('$cid','$cname','$xfen','$xshu')";
     $info = mysql_query($connection,$sql);
     if ($info) {
        ?>
        <script type="text/javascript">
          alert("添加课程成功");
          window.location.href="adduser.php";
       </script><?php 
     }else{
        ?>
        <script type="text/javascript">
          alert("添加课程失败");
          window.location.href="adduser.php";
       </script> 
       <?php
     }

  header("Location:adduser.php"); 
?>

?> 
</body>  
</html>