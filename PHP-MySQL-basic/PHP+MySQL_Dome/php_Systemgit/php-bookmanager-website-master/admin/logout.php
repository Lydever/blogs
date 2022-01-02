<?php
session_start();
require "conn.php";
require "adminfun.inc";
require "top.php";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>_注销登录</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>

    <?php
    //取得已经登录用户的信息
    $tadmin = $_SESSION['admin'];
    $afun = new adminos();
    $afun -> logout($tadmin);
    ?>
    </div>
</center>
</body>
</html>
