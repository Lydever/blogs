<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php函数</title>
</head>
<body>
<?php
    function addAge($age){
      $age=$age+1;
      echo $age;
    }
    $age=18;
    addAge($age);
    echo "<br>";
    echo $age;
?>
<?php
    function addAge(&$age){
      $age=$age+1;
      echo $age;
    }
    $age=18;
    addAge($age);
    echo "<br>";
    echo $age;
?>
<br><br><br>

<?php
 function circle($r){
   echo "圆的半径为".$r."的面积为:".$r*$r*M_PI;
 } 
 echo circle(4);
?><br><br><br>


<?php
  function test($n1,$n2){
      if($n1>$n2){
          return $n1."&nbsp".$n2;
      }
      else{
        return $n2."&nbsp".$n1;
      }
  }
  echo test(6,9);
?><br><br><br>

<?php
  function maxNum($num1,$num2,$num3){
      $temp;
      if($num1>$num2){
          $temp=$num1;
      }else{
          $temp=$num2;
      }
      if($num3>$temp){
          $temp=$num3;
      }
      return $temp;
  }
  maxNum(14,19,48);
  echo "三个整数中的最大值为:".maxNum(14,19,48);
?>
</body>
</html>