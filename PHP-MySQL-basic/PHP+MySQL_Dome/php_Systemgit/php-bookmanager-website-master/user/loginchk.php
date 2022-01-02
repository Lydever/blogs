<?php
session_start();
@$_SESSION["admin"];
require "conn.php";
require "userfun.inc";
require "top.php";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_用户登录</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    //获取登录页面传递来的用户信息
    $tuserid = $_POST['userid'];
    $tpwd = $_POST['password'];
    $ufun = new useros();
    $ufun -> loginchk($tuserid,$tpwd,$user);
    ?>
</center>
</body>
</html>
