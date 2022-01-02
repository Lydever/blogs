<?php
session_start();
require "adminfun.inc";
require "conn.php";
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_查找用户信息</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    require "top.php";
    require "leftbar.php";
    //判断并接收传递来的参数
    //判断是否是翻页时传递过来的参数
    if(isset($_GET['userid']))
    {
        $tuserid = $_GET['userid'];
    }
    else
    {
        $tuserid = $_POST['userid'];
    }

    if(isset($_GET['username']))
    {
        $tusername = $_GET['username'];
    }
    else
    {
        $tusername = $_POST['username'];
    }

    if(isset($_GET['telephone']))
    {
        $ttelephone = $_GET['telephone'];
    }
    else
    {
        $ttelephone = $_POST['telephone'];
    }

    $afun = new adminos();
    $afun -> searchuser($tuserid,$tusername,$ttelephone);

    echo "<br><a href='edituser.php'>返 回 </a><br>";

    ?>
</center>
</body>
</html>
