<?php
session_start();
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
    require "userfun.inc";
    require "top.php";
    require "leftbar.php";
    if( isset($_GET['page']) )
    {
        $page = intval( $_GET['page'] );
    }
    else
    {
        $page = 1;
    }
    $ufun = new useros();
    $ufun -> allbook($page,$psize);
    ?>
</center>
</body>
</html>
