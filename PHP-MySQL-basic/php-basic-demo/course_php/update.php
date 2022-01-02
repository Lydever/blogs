<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改</title>
</head>
<body>
<div align="center">
        <h3>操作菜单</h3>
        <a href="browse.php" target="_blank">浏览</a>
        <a href="insert.php" target="_blank">添加</a>
        <a href="update.php" target="_blank">修改</a>
        <a href="delete.php" target="_blank">修改</a>
    </div>

<?php
   require "database.php";
   $sql = "select * form course";
   $res = mysqli_query($connection, $sql);
?>
<table  width='300' border='1' cellspacing='0' align='center'>
    <tr align='center' height='25'>
        <td align='center'>课程号</td>
        <td align='center'>课程名</td>
        <td align='center'>学分</td>
        <td align='center'>学时数</td>
        <td align='center'>修改</td>
    </tr>        
<?php
while($row=mysqli_fetch_array($res)){
?>
<tr height="30">
    <td align="center"><?php echo $row['课程号'] ?></td>
    <td align="center"><?php echo $row['课程名'] ?></td>
    <td align="center"><?php echo $row['学分'] ?></td>
    <td align="center"><?php echo $row['学时数'] ?></td>
    <td align="center"><a href='update2.php?cid=<?php echo $row['课程号']; ?>'>修改</a></td>
</tr>
<?php
 }
?>
</table> 
</body>
</html>