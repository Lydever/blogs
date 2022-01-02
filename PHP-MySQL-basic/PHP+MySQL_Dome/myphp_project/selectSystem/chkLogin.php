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
include("conn/db_conn.php");
$role=$_POST['role'];
$username=$_POST['username'];
$userpwd=$_POST['userpwd'];
if($role=="teacher")
{
    $ChkLogin="select * from teacher where TeaNo='$username' and Pwd='$userpwd'";
}
else
{
    $ChkLogin="select * from student where StuNo='$username' and Pwd='$userpwd'";
}
$ChkLoginResult=mysqli_query($conn,$ChkLogin);
$number=mysqli_num_rows($ChkLoginResult);
$row=mysqli_fetch_array($ChkLoginResult);
if($number>0){
    if($role=="teacher"){
        $_SESSION["username"]=$username;
        $_SESSION["role"]="teacher";
        header("Location:TeacherSystem/showCourse.php");
    }
    else{
        $_SESSION["username"]=$username;
        header("Location:StuCourseSystem/showCourse.php");
    }
}else{
    echo"<script>";
    echo"alert(\"错误的用户名或者密码，请重新登录\");";
   // echo"location.href=\"login.php\"";
    echo"</script>";
}
?>
</body>
</html>