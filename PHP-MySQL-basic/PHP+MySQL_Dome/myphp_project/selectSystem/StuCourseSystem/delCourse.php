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

    <?php

    session_start();
    if (!isset($_SESSION['username'])){
        header("Location:../login.php");
        exit();
    }
   include ("../db_conn.php");
    include ("header.php");
    $StuNo = $_POST['StuNo'];
    $CouNo = $_POST['CouNo'];
    $delCourse = "delete from stucou where CouNo='$CouNo' and stuNo='$StuNo'";
    $delCourse_res = mysqli_query($conn,$delCourse);
    if ($delCourse_res){
        echo "<script>";
        echo "alert(\"所选课程删除成功\");";
        echo "location.href=\"showCourse.php\"";
        echo  "</script>";
    }else{
        echo "<script>";
        echo "alert(\"所选课程删除失败,请重新修改\");";
        echo "location.href=\"delCourse.php\"";
        echo  "</script>";
    }
    ?>
</table>
</body>
</html>



























