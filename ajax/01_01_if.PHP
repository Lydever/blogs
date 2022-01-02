<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php流程分支</title>
</head>
<body>
  3.判断成绩等级
    <?php
      $score=96;
      echo "成绩:".$score;
      switch($score){
        case $score>=90:
          echo "优秀";
        break;
        case $score>=80:
          echo "良好";
        break;
        case $score>=60:
          echo "合格";
        break;
       default:
          echo "不合格";
        break;
      }
     ?>
    <?php
      $score=96;
      echo "成绩:".$score;
      if($score>=90){
        echo "优秀";
      }
      else if($score>=80){
        echo "良好";
      }
      else if($score>=60){
        echo "合格";
      }
      else{
        echo "不合格";
      }
     ?>
     1.输出变量并且字体为红色
<?php
     $name="李";
     echo "<div>$name</div> style='color:red;'";

?>
2.编程实现输出三个整数中的最大值
<?php
     $n1=3;
     $n2=45;
     $n3=100;
     if($n1>$n2){
         if($n1>$n3){
           echo "三个整数中的最大值为：".$n1;
         }else{
        echo "三个整数中的最大值为：".$n2;
      }
     }
     else{
      if($n2>$n3){
       echo "三个整数中的最大值为：".$n2;
     }else{
        echo "三个整数中的最大值为：".$n3;  
     }
    }
?>
4.打印金字塔<br>
<?php
 $i;
 $j;
 for($i=1;$i<=5;$i++){
   for($j=1;$j<=5-$i;$j++){
     echo "&nbsp";
   }
   for($k=1;$k<=2*$i-1;$k++){
     echo "*";
   }
   echo "<br>";
 }
?>
</body>
</html>