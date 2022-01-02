<?php
require "conn.php";
require "adminfun.inc";
require "top.php"
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_借阅图书</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    //取得提交的借阅信息
    $tuserid=trim($_POST['userid']);
    $tbookid = "";
    if($_POST['bookid'] != "")
    {
        $tbookid=trim($_POST['bookid']);
    }
    else
    {
        $tbookid=trim($_POST['bookid2']);
    }
    $tloandate=trim($_POST['loandate']);
    $tstate = trim($_POST['state']);
    $tmemo=nl2br(htmlspecialchars($_POST['memo']));

    $afun = new adminos();
    $afun -> addloan($tuserid,$tbookid,$tloandate,$tstate,$tmemo,$loan);
    ?>
</center>
</body>
</html>
