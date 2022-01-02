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
include ("header.php");
$ConNo = $_GET['CouNo'];
$oldpic = "../uploads/".$ConNo."jpg";
@unlink($oldpic);
$deleteCourse_sql = "DELETE FROM Course WHERE ConNo='$ConNo'";
$deleteCourse_res = mysqli_query($conn,$deleteCourse_sql);

if ($deleteCourse_res){
    echo "<script>";
    echo "alert(\"课程删除成功\")";
    echo "location.href=\"showCourse.php\"";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert(\"课程删除失败,请重新修改\")";
    echo "location:javaScript:history.go(-1)";
    echo "</script>";
}
