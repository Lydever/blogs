<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<center>
    <a href="showCourse.php">查看课程</a>
    <a href="searchCourse.php">查询课程</a>
    <a href="showChoosed.php">查看已选课程</a>
    <a href="../outLogin.php">退出系统</a>
</center>
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location:../login.php");
    exit();
}
include("../conn/db_conn.php");
include ("header.php");
$StuNo=$_SESSION['username'];
$sql="select * from course,stucou where course.CouNo=stucou.CouNo and StuNo='$StuNo' ";
$result=mysqli_query($conn,$sql);
?>
<table width="900"  align="center" >
    <tr  bgcolor="#0066CC">
        <td width="40"><font color="#FFFFFF">课程编码</font></td>
        <td width="40" align="center"><font color="#FFFFFF">操作</font></td>
        <td width="130"><font color="#FFFFFF">课程名称</font></td>
        <td width="56"><font color="#FFFFFF">课程类型</font></td>
        <td width="20"><font color="#FFFFFF">学分</font></td>
        <td width="83"><font color="#FFFFFF">任课教师</font></td>
        <td width="136"><font color="#FFFFFF">上课时间</font></td
    </tr>
    <?php
    $number=mysqli_num_rows($result);

    for($i=0;$i<$number;$i++)
    {
        $row=mysqli_fetch_array($result);

        if($i%2==0)
            echo "<tr bgcolor='#dddddd'>";
        else
            echo "<tr>";
        echo "<td width='40'><a href='detailCourse.php?CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
        echo"<td width='40'><a href='delCourse.php?CouNo=".$row['CouNo']."'>删除</a></td>";
        ?>

        <td width="108" align="center"><?php echo $row['CouName'] ?></td>
        <td width="127"><?php echo $row['Kind']  ?></td>
        <td width="105"><?php echo $row['Credit']  ?></td>
        <td width="56"><?php echo $row['Teacher'] ?></td>
        <td width="83"><?php echo $row['SchoolTime']  ?></td>
        </tr>

        <?php
    }
    ?>
</table>
</body>
</html>


