<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>index</title>
</head>
<body>
  <div align="center">
      <h3>操作菜单</h3>
      <a href="browse.php" target="_blank">浏览</a>
      <a href="insert.php" target="_blank">添加</a>
      <a href="update.php" target="_blank">修改</a>
      <a href="delete.php" target="_blank">删除</a>
  </div>


  <?php
include("database.php");
$sql = 'select * from course';
$res = mysqli_query($connection,$sql);

echo "<table  width='300' border='1' cellspacing='0' align='center'>";
echo "<tr align='center' height='25'>
        <td align='center'>课程号</td>
        <td align='center'>课程名</td>
        <td align='center'>学分</td>
        <td align='center'>学时数</td>
      </tr>";
       while($row = mysqli_fetch_array($res)){
        echo "<tr align='center' height='30' >";
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

