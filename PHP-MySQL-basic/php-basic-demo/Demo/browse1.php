<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>浏览</title>
</head>
<body>
	<a href=" browse1.php" target="_blank">浏览</a>
	<a href="insert1.php" target="_blank">添加</a>
	<a href="delete1.php" target="_blank">删除</a>
	<a href="update1.php" target="_blank">修改</a>
	<?php
           include("datebase.php");
           $sql = 'select * from course';
           $res = mysqli_query($connection,$sql);

           echo '<table width="600" border="1" cellpadding="0" cellspacing="0">';
           echo '<tr align="center" height="30">
           <td align="center">课程号</td>
           <td align="center">课程名</td>
           <td align="center">学分</td>
           <td align="center">学时数</td>
           </tr>';

       while($row = mysqli_fetch_array($res)){
       	echo "<tr align='center' height='30' >";
       	echo '<td align="center">'.$row['课程号'].'</td>';
       	echo '<td align="center">'.$row['课程名'].'</td>';
       	echo '<td align="center">'.$row['学分'].'</td>';
       	echo '<td align="center">'.$row['学时数'].'</td>';
       	echo "</tr>";
       }
    echo '</table>';
	?>
</body>
</html>