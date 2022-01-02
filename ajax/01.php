<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      echo "<h1>Hello world</h1>";
      echo "这是我的第一个PHP网页";
      echo "<br>";
      echo $str="this is my first page";
      echo "<br>";
      echo $s="this is my first page";
      echo "<br>";
      echo $str='this is my first page';
    ?>
<br>
<br>
    <?php
     Date_default_timezone_set("PRC");
     echo date('Y/m/d H:i:s',time()+24*3600);
    ?>
<br>
<br>
<?php
      echo  $str="1830226";
      echo  $str="李映霞";

    ?>
</body>
</html>