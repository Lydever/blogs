<?php
session_start();
require "conn.php";
require "userfun.inc";
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title><?php echo $webname;?>_所有借阅</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="../default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <?php
    date_default_timezone_set("PRC");
    require "top.php";
    require "leftbar.php";
    @$userid = $_SESSION['userid'];
    $gbdate = date("Y-m-d");
    if($userid == "")
    {
        echo "<div id='main'><div class='hr'><hr /></div><h2>请 先 登 录</h2></div>";
    }
    else
    {

        $ufun = new useros();
        $ufun -> loanbook();
    }

    ?>
</center>
</body>
</html>
