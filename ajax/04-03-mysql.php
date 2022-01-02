  <meta charset="UTF-8">

<?php
$connection = mysqli_connect('localhost','root','') or die('mysql连接服务器失败!');
$db_selected = mysqli_select_db($connection,'management') or die('mysql数据库连接失败');

mysqli_set_charset($connection,'utf8');
$sql = 'select * from student';
$res = mysqli_query($connection,$sql);

echo '<table width="600" border="1" cellpadding="0" cellspacing="0">';
echo '<tr align="center" height="30">
        <td align="center">学号</td>
        <td align="center">姓名</td>
        <td align="center">性别</td>
        <td align="center">出生时间</td>
        <td align="center">专业</td>
        <td align="center">总学分</td>
      </tr>';

       while($row = mysqli_fetch_array($res)){
       	echo "<tr align='center' height='30' >";
       	echo '<td align="center">'.$row['学号'].'</td>';
       	echo '<td align="center">'.$row['姓名'].'</td>';
       	echo '<td align="center">'.$row['性别'].'</td>';
       	echo '<td align="center">'.$row['出生时间'].'</td>';
       	echo '<td align="center">'.$row['专业'].'</td>';
       	echo '<td align="center">'.$row['总学分'].'</td>';
       	echo "</tr>";
       }
echo '</table>';