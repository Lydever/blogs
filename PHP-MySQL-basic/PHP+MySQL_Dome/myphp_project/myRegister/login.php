<?php
include ('database.php');

//收集表单提交的数据
$userName = addslashes($_POST['userName']);
$password = addslashes($_POST['password']);

//连接数据库服务器
getConnection();

//判断用户名和密码是否输入正确
$sql = "select * from users where userName='$userName' and password='$password'";
$result = mysqli_query($sql);
if(mysqli_num_rows($result)>0){
    echo '用户名和密码输入正确!登录成功!';
}else{
    echo'用户名和密码输入错误!登录失败!';
}
closeConnection();