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


    if(isset($_GET['name']))
    {
        $tname = $_GET['name'];
    }
    else
    {
        $tname = $_POST['name'];
    }

    if(isset($_GET['sex']))
    {
        $tsex = $_GET['sex'];
    }
    else
    {
        $tsex = $_POST['sex'];
    }

    if(isset($_GET['telephone']))
    {
        $ttelephone = $_GET['telephone'];
    }
    else
    {
        $ttelephone = $_POST['telephone'];
    }

    if(isset($_GET['userid']))
    {
        $tuserid = $_GET['userid'];
    }
    else
    {
        $tuserid = $_POST['userid'];
    }

    if(isset($_GET['pass']))
    {
        $tpass = $_GET['pass'];
    }
    else
    {
        $tpass = $_POST['pass'];
    }

    if(isset($_GET['confirmpass']))
    {
        $tconfirmpass = $_GET['confirmpass'];
    }
    else
    {
        $tconfirmpass = $_POST['confirmpass'];
    }

    if(isset($_GET['memo']))
    {
        $tmemo = $_GET['memo'];
    }
    else
    {
        $tmemo = $_POST['memo'];
    }

    $ufun = new useros();
    $ufun -> registeruser($tname,$tuserid,$tpass,$tconfirmpass,$tmemo,$tsex,$ttelephone)
    ?>
</center>
</body>
</html>
