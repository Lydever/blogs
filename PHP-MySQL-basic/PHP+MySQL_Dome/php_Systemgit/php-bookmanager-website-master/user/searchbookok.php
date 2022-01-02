<?php
session_start();
require "userfun.inc";
require "conn.php";
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_所有图书</title>
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
    if(isset($_GET['bookid']))
    {
        $tbookid = $_GET['bookid'];
    }
    else
    {
        $tbookid = $_POST['bookid'];
    }

    if(isset($_GET['bookname']))
    {
        $tbookname = $_GET['bookname'];
    }
    else
    {
        $tbookname = $_POST['bookname'];
    }

    if(isset($_GET['bookauthor']))
    {
        $tbookauthor = $_GET['bookauthor'];
    }
    else
    {
        $tbookauthor = $_POST['bookauthor'];
    }

    if(isset($_GET['publish']))
    {
        $tpublish = $_GET['publish'];
    }
    else
    {
        $tpublish = $_POST['publish'];
    }
    $ufun = new useros();
    $ufun -> searchbook($tbookid,$tbookname,$tbookauthor,$tpublish,$book);
    ?>
</center>
</body>
</html>
