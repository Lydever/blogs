<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../login.php");
    exit();
}else if($_SESSION['role']<>'teacher'){
    header("Location:../login.php");
    exit();
}

include ('Location:../db_conn.php');
include("header.php");
$StuNo = $_SESSION['username'];
$showCourse_sql = "SELECT * FROM  course order by CouNo";
$showCourse_res = mysqli_query($conn,$showCourse_sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>显示课程信息</title>
</head>
<body>
<table>
    <tr>
        <td colspan="3"><h2>课程信息</h2></td>
    </tr>
    <tr>
        <td><img src="../uploads/<?php echo $ConNo.".jpg" ?>" alt=""></td>
        <td>编号</td>
        <td><?php echo $row['CouNo'] ?></td>
    </tr>
    <tr>
        <td>名称</td>
        <td><?php echo $row['CouName']?></td>
    </tr>

    <tr>
        <td>类型</td>
        <td><?php echo $row['Kind']?></td>
    </tr>
</table>
</body>
</html>






























