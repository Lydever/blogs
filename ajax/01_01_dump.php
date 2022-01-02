<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php数据类型和变量</title>
</head>
<body>
  <?php
    $num1=-10;
    $num2=-4;
    $num3=$num1/$num2;
    $num4=$num1%$num2;
    var_dump($num3);
    echo "<br>";
    var_dump($num4);
  ?>
<br>
<br>
<?php
   $num1=2;
   $num2=++$num1;
   $num3=2;
   $num4=$num3++;
   echo '$num1=',$num1;
   echo "<br>";
   echo '$num3=',$num3;
   echo "<br>";
   echo '$num4=',$num4;
  ?>
<br>
<br>
<?php
 var_dump($a=($b=4)+5);
 echo "<br>";
 echo $a;
 echo "<br>";
 echo $b;
 ?>
<br>
<br>

<?php
  $a=5;
  $a+=3;
  echo $a;
  echo  "<br>";
  $a*=2;
  echo $a;
  echo "<br>";
  $a/=4;
  echo $a;
  ?>
<br>
<br>
//比较远算符
  <?php
    $a=5;
    $b="5.0";
    $c=3;
    var_dump($a==$b);
    echo "<br>";
    var_dump($a===$b);
    echo"<br>";
    var_dump($a!==$b);
    var_dump($a<=$b);
  ?>
<br>
<br>

<?php
  $a=3>2;
  $b=3>4;
  var_dump($a&&$b);
  echo "<br>";
  var_dump($a||$b);
  echo "<br>";
  var_dump(!$a);
   echo "<br>";
   var_dump($a xor $b);
   echo "<br>";
  ?>
</body>
</html>