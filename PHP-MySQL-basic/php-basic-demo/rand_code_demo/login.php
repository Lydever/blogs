<?php 

$connection = mysqli_connect('localhost','root','') or die('mysql连接服务器失败!');
$db_selected = mysqli_select_db($connection,'management') or die('mysql数据库连接失败');
mysqli_query($connection,'set names utf8');
if (!isset($_POST['submit'])) {
	exit('无法访问');
}

$username = $_POST['username'];
$password = $_POST['password'];
$checked = mysql_query("select * from register where username='$username' and pssword='$password' limit 1");
$result=mysqli_fetch_array($checked);
if ($result) {
	echo '登录成功';
}else{
	echo '登录失败';
	exit;
}

 ?>