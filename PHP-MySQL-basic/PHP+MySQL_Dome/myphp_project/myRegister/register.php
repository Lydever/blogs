<?php
include ('database.php');
include ('system.php');

if (empty($_POST)){
    exit('您提交的表单数据超过post_max_size的配置<br>');
}

$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
if ($password!=$confirmPassword){
    exit('输入的密码和确认密码不相同!');
}

$userName = $_POST['userName'];
$domain = $_POST['domain'];
$userName = $userName.$domain;

//判断用户名是否占用
$userNameSQL = "select * from users where userName='$userName' ";
getConnection();
$result = mysqli_query($userNameSQL);
if (mysqli_num_rows($result)>0){
    closeConnection();
    exit('用户名已经被占用,请更换其他用户名!');
}

//收集用户其他信息
$sex = $_POST['sex'];
if (empty($_POST['interests'])){
    $interests = '';
}else{
    $interests = implode(';'.$_POST['interests']);
}

$remark = $_POST['remark'];
$mypic = $_FILES['myPicture']['name'];

//只有文件上传成功才或者没有附件上传时才进行注册
$registerSQL = "insert into users value(null,'$userName','$password','$sex','$interests','$myPictureName','$remark')";
$message = upload($_FILES['myPicture'],'upload');
if ($message=='文件上传成功' || $message=='没有选择文件上传!'){
    mysqli_query($registerSQL);
    $userID = mysqli_insert_id();
    echo '用户信息注册成功!<br><br>';
}else{
    exit($message);
}

//从数据库中提取用户注册信息

$userSQL = 'select * from users where user_id=$userID';
$userRes = mysqli_query($userSQL);
if($user=mysqli_fetch_array($userRes)){

    echo "您注册的用户名为：".$user["userName"]."<br/><br/>";
    echo "您填写的登录密码为：".$user["password"]."<br/><br/>";
    echo "性别：".$user["sex"]."<br/><br/>";
    echo "爱好：".$user["interests"]."<br/><br/>";
    $pictureAdrees="uploads/".$myPictureName;
    echo "上传的照片：";
    echo '<img src="'.$pictureAdrees.'"  width="200px">';
    echo "<br/><br/>";
    echo "备注信息：".$user['remark'];
}else{
    exit("用户信息注册失败！");
}
closeConnection();

?>


















