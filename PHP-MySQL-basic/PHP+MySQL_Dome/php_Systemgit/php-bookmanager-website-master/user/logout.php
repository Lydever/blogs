<?php
session_start();
require "conn.php";
require "userfun.inc";
require "top.php";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>用户注销</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    //取得已经登录用户的信息
    $tuserid = $_SESSION['userid'];
    $ufun = new useros();
    $ufun -> logout($tuserid);
    ?>
    </div>
</center>
</body>
</html>
