<?php
session_start();
require "conn.php";
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_查找图书</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    require "top.php";
    require "leftbar.php";
    require "../user/searchbookframe.php";
    ?>
</center>
</body>
</html>
