<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改</title>
</head>
<body>
<?php
   require "database.php";

    $cid = @$_GET['cid'];
    $sql = @mysql_query("SELECT * FROM course WHERE 课程号=$cid",$connection);
    $sql_arr = @mysql_fetch_assoc($sql); 

?>

<form action="edituser_server.php" method="post">
    <label>课程号: </label><input type="text" name="id" value="<?php echo $sql_arr['cid']?>">
    <label>课程名：</label><input type="text" name="cname" value="<?php echo $sql_arr['cname']?>">
    <label>学分：</label><input type="text" name="xfen" value="<?php echo $sql_arr['xfen']?>">
    <label>学时数：</label><input type="text" name="xshu" value="<?php echo $sql_arr['xshu']?>">
    <input type="button" value="修改">
</form>

</body>
</html>