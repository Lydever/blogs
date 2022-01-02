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
include ('database.php');

$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];
if ($role=="teacher"){
    $chkLogin = "select * from teacher where TeaNo='$username' and password='$password'";
}else{
    $chkLogin = "select * from student where StuNo='$username' and password='$password'";
}
$chkLoginRes = mysqli_query($conn,$chkLogin);
$num = mysqli_num_rows($chkLoginRes);
$row = mysqli_fetch_array($chkLoginRes);

if ($num>0){
    if ($role=='teacher'){
        $_SESSION['username']=$username;
        $_SESSION['role']='teacher';
        header('locatio:showCourse.php');
    }
}else{
    echo "<script>";
    echo "alert(\"错误的用户名或密码,请重新登录\")";
    echo "location.href=\"login.php\"";
    echo "</script>";
}


?>
</body>
</html>
