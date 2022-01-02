<?php
session_start();
@$_SESSION["admin"];
require "conn.php";
require "adminfun.inc";
require "top.php";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_管理员登录</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    //获取登录页面传递来的用户信息
    $tadmin = $_POST['admin'];
    $tpwd = $_POST['password'];
    $afun = new adminos();
    $afun -> loginchk($tadmin,$tpwd,$admin);
    ?>
</center>
</body>
</html>
