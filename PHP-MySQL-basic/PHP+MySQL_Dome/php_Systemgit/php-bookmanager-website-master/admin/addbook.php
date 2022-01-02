<?php
require "conn.php";
require "adminfun.inc";
require "top.php"
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_新书入库</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    //取得提交图书的信息
    $tbookid=trim($_POST['bookid']);
    $tbookname=trim($_POST['bookname']);
    $tauthor=trim($_POST['bookauthor']);
    $tpublish=trim($_POST['publish']);
    $tpdate=trim($_POST['pdate']);
    $tprice=trim($_POST['price']);
    $tamount = trim($_POST['amount']);
    $tstate = trim($_POST['state']);
    $tmemo=nl2br(htmlspecialchars($_POST['memo']));

    $afun = new adminos();
    $afun->addbook($tbookid,$tbookname,$tauthor,$tpublish,$tpdate,$tprice,$tamount,$tstate,$tmemo,$book);
    ?>
</center>
</body>
</html>
