<?php
session_start();
require "userfun.inc";
require "conn.php";
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_用户注册</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    require "top.php";
    require "leftbar.php";

    if(isset($_GET['editid']))
    {
        $tid = $_GET['editid'];
    }
    else
    {
        $tid = $_POST['editid'];
    }

    if(isset($_GET['name']))
    {
        $tname = $_GET['editname'];
    }
    else
    {
        $tname = $_POST['editname'];
    }

    if(isset($_GET['editsex']))
    {
        $tsex = $_GET['editsex'];
    }
    else
    {
        $tsex = $_POST['editsex'];
    }

    if(isset($_GET['edittelephone']))
    {
        $ttelephone = $_GET['edittelephone'];
    }
    else
    {
        $ttelephone = $_POST['edittelephone'];
    }

    if(isset($_GET['edituserid']))
    {
        $tuserid = $_GET['edituserid'];
    }
    else
    {
        $tuserid = $_POST['edituserid'];
    }

    if(isset($_GET['editpass']))
    {
        $tpass = $_GET['pass'];
    }
    else
    {
        $tpass = $_POST['editpass'];
    }

    if(isset($_GET['editconfirmpass']))
    {
        $tconfirmpass = $_GET['editconfirmpass'];
    }
    else
    {
        $tconfirmpass = $_POST['editconfirmpass'];
    }

    if(isset($_GET['editmemo']))
    {
        $tmemo = $_GET['memo'];
    }
    else
    {
        $tmemo = $_POST['editmemo'];
    }

    $ufun = new useros();
    $ufun -> edituser($tid,$tname,$tuserid,$tpass,$tconfirmpass,$tmemo,$tsex,$ttelephone)
    ?>
</center>
</body>
</html>
