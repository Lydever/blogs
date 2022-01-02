<?php
session_start();
require "conn.php";
require "userfun.inc";
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_编辑用户信息</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    require "top.php";
    require "leftbar.php";
    @$userid = $_SESSION['userid'];
    @$admin =$_SESSION['admin'];
    @$tid = $_GET['id'];
    if ($admin != "" && $tid != "")
    {
        require "edituserframe.php";
    }
    elseif($admin != "")
    {
        require "edituserframe.php";
    }
    elseif($userid == "")
    {
        echo "<div id='main'><div class='hr'><hr /></div><h2>请 先 登 录</h2></div>";
    }
    else
    {
        require "edituserframe.php";
    }
    ?>
</center>
</body>
</html>
