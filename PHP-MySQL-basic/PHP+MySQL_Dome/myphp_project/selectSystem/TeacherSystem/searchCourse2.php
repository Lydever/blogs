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
if(!isset($_SESSION['username']))
{
    header("Location:../login.php");
    exit();
}
$keyWord=$_GET['keyWord'];
$ColumnName=$_GET['ColumnName'];
$keyWord=trim($keyWord);
include("../conn/db_conn.php");
include("header.php");
switch($ColumnName)
{
    case "CouNo";
        $sql="select * from course where CouNo LIKE \"%".$keyWord."%\"";
        break;
    case "CouName";
        $sql="select * from course where CouName LIKE \"%".$keyWord."%\"";
        break;
    case "Kind";
        $sql="select * from course where Kind LIKE \"%".$keyWord."%\"";
        break;
    case "Credit";
        $sql="select * from course where Credit LIKE \"%".$keyWord."%\"";
        break;
    case "Teacher";
        $sql="select * from course where Teacher LIKE \"%".$keyWord."%\"";
        break;
    case "DepartName";
        $sql="select * from course,Department where course.DepartNo=Department.DepartNo and DepartName LIKE \"%".$keyWord."%\"";
        break;
    case "SchoolTime";
        $sql="select * from course where SchoolTime LIKE \"%".$keyWord."%\"";
        break;
}
$result=mysqli_query($conn,$sql);
?>

<table width="650"  align="center" >
    <tr  bgcolor="#0066CC">
        <td width="80"><font color="#FFFFFF">课程编码</font></td>
        <td width="220" align="center"><font color="#FFFFFF">课程名称</font></td>
        <td width="80"><font color="#FFFFFF">课程类别</font></td>
        <td width="50"><font color="#FFFFFF">学分</font></td>
        <td width="80"><font color="#FFFFFF">任课老师</font></td>
        <td width="120"><font color="#FFFFFF">上课时间</font></td>
    </tr>
    <?php
    if(mysqli_num_rows($result)>0){
        $number=mysqli_num_rows($result);
        for($i=0;$i<$number;$i++)
        {
            $row=mysqli_fetch_array($result);

            if($i%2==0)
                echo "<tr bgcolor='#dddddd'>";
            else
                echo "<tr>";
            echo "<td width='80'><a href='detailCourse.php?CouNo=".$row['CouNo']."'>".$row['CouNo']."</a></td>";
            ?>

            <td width="220" align="center"><?php echo $row['CouName'] ?></td>
            <td width="80"><?php echo $row['Kind']  ?></td>
            <td width="50"><?php echo $row['Credit']  ?></td>
            <td width="80"><?php echo $row['Teacher'] ?></td>
            <td width="120"><?php echo $row['SchoolTime']  ?></td>
            </tr>

            <?php
        }
    }?>
</table>
</body>
</html>