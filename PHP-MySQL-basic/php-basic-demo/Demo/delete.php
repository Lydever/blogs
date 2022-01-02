
<?php
include("datebase.php");
$cid = $_GET['cid'];
$sql = "delete from course where 课程号='$cid' ";
$squery = mysqli_query($connection,$sql);
if($squery){
  echo "<script>alert('删除课程成功!');window.location.href='delete.php';</script>";
}else{
  echo "<script>alert('删除课程失败!');window.location.href='delete.php';</script>";
}

           echo '<table width="600" border="1" cellpadding="0" cellspacing="0">';
           echo '<tr align="center" height="30">
           <td align="center">课程号</td>
           <td align="center">课程名</td>
           <td align="center">学分</td>
           <td align="center">学时数</td>
           <td align="center">删除</td>
           </tr>';

       while($row = mysqli_fetch_array($res)){
       	echo "<tr align='center' height='30' >";
       	echo '<td align="center">'.$row['课程号'].'</td>';
       	echo '<td align="center">'.$row['课程名'].'</td>';
       	echo '<td align="center">'.$row['学分'].'</td>';
       	echo '<td align="center">'.$row['学时数'].'</td>';
       	echo '<td align="center">'.'<a href="#">删除</a>'.'</td>';
       	echo "</tr>";
       }
    echo '</table>';
	?>