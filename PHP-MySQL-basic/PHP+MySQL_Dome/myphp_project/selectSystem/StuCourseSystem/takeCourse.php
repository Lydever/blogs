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
if(! isset($_SESSION["username"])){
    header("Location:../login.php");
    exit();
}
include("../conn/db_conn.php");
include ("header.php");
$StuNo=$_POST[StuNo];
$CouNo=$_POST[CouNo];
$ShowDetail_sql="select * from stucou where StuNo='$StuNo'";
$ShowDetailResult=mysqli_query($conn,$ShowDetail_sql);
if(mysqli_num_rows($ShowDetailResult)<5){
    $WillOrder=mysqli_num_rows($ShowDetailResult)+1;
    $insertCourse="insert into stucou(StuNo,CouNo,WillOrder,State)values('$StuNo','$CouNo','$WillOrder','报名')";
    $insertCourse_Result=mysqli_query($insertCourse);
    if($insertCourse_Result){
        echo"<script>";
        echo"alert(\"选择课程成功\");";
        echo"location.href=\"showChoosed.php\"";
        echo"</script>";
    }else{
        echo"<script>";
        echo"alert(\"选择课程失败，请重新选择\");";
        echo"location.href=\"detailCourse.php\"";
        echo"</script>";
    }
}else{
    echo"<script>";
    echo"alert(\"课程已经选择了五门，请先删除已选课程在选择\");";
    echo"location.href=\"showChoosed.php\"";
    echo"</script>";
}
?>
</body>
</html>