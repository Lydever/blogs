<?php
session_start();
require "conn.php";
require "adminfun.inc";
require "top.php"
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    if($_SESSION['admin'] == "")
    {
        echo "<h2>对不起，你不是管理员，没有权限执行该操作！</h2>";
        echo "<script language=javascript>alert('对不起，你不是管理员，没有权限执行该操作！');history.go(-1)</script>";
        exit;
    }

    //获取传递来的用户信息
    $tid = $_GET['id'];
    $tbookname = $_GET['bookname'];
    $afun = new adminos();
    $afun -> delbook($tid,$tbookname,$book);
    ?>
</center>
</body>
</html>
