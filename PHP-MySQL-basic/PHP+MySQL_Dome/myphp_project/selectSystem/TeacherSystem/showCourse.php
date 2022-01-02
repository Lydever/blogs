<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
session_start();
if(! isset($_SESSION['username']))
{
    header("Location:../login.php");
    exit();
}
include("../conn/db_conn.php");
include("header.php");
$StuNo=$_SESSION['username'];
$ShowCourse_sql="select * from course where CouNo not in(select CouNo from stucou where StuNo='$StuNo')ORDER BY CouNo";
$ShowCourseResult=mysqli_query($conn,$ShowCourse_sql);
?>
<table width="620" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr bgcolor="#0066CC">
        <td width="80" align="center"><font color="#FFFFFF">课程编码</font></td>
        <td width="220" align="center"><font color="#FFFFFF">课程名称</font></td>
        <td width="80"><font color="#FFFFFF" align="center">课程类型</font></td>
        <td width="50"><font color="#FFFFFF" align="center">学分</font></td>
        <td width="80"><font color="#FFFFFF" align="center">任课教师</font></td>
        <td width="100"><font color="#FFFFFF" align="center">上课时间</font></td>
    </tr>
    <?php
    if(mysqli_num_rows($ShowCourseResult)>0){
        $number=mysqli_num_rows($ShowCourseResult);
        if(empty($_GET['p']))
            $p=0;
        else {$p=$_GET['p'];}
        $check=$p +10;
        for($i=0;$i<$number;$i++){
            $row=mysqli_fetch_array($ShowCourseResult);
            if($i>=$p && $i < $check){
                if($i%2 ==0)
                    echo"<tr bgcolor='#DDDDDD'>";
                else
                    echo"<tr>";
                echo"<td width='80' align='center'><a href='detailCourse.php? CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
                echo"<td width='220'>".$row['CouName']."</td>";
                echo"<td width='80'>".$row['Kind']."</td>";
                echo"<td width='50'>".$row['Credit']."</td>";
                echo"<td width='80'>".$row['Teacher']."</td>";
                echo"<td width='100'>".$row['SchoolTime']."</td>";
                echo"</tr>";
                $j=$i+1;
            }
        }
    }
    ?>
</table>
<br>
<center>点击课程编码链接可以查看课程细节</center>
<br>
<table width="400" border="0" align="center">
    <tr>
        <td align="center"><a href="ShowCourse.php? p=0">第一页</a></td>
        <td align="center">
            <?php
            if($p>9){
                $last=(floor($p/10)*10)-10;
                echo"<a href='showCourse.php? p=$last'>上一页</a>";
            }
            else
                echo"上一页";
            ?>
        </td>
        <td align="center">
            <?php
            if($i>9 and $number>$check)
                echo"<a href='showCourse.php?p=$j'>下一页</a>";
            else
                echo"下一页";
            ?>
        </td>
        <td align="center">
            <?php
            if($i>9)
            {
                $final=floor($number/10)*10;
                echo"<a href='showCourse.php? p=$final'>最后一页</a>";
            }
            else
                echo"最后一页";
            ?>

        </td>
    </tr>
</table>
</body>
</html>