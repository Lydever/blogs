  <meta charset="UTF-8">

<?php
$connection = mysqli_connect('localhost','root','') or die('mysql连接服务器失败!');
$db_selected = mysqli_select_db($connection,'management') or die('mysql数据库连接失败');

mysqli_set_charset($connection,'utf8');
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