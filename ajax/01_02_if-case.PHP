<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php流程分支</title>
</head>
<body>
  //1.程序判断输出今天是星期几
    <?php
      switch(date("D")){
        case "Mon":
          echo "<br>今天是周一";
        break;
        case "Tue":
          echo "<br>今天是周二";
        break;
        case "Wed":
          echo "<br>今天是周三";
        break;
        case"Tnu":
          echo "<br>今天是周四";
        break;
        case "Fri":
          echo "<br>今天是周五";
        break;
       default:
          echo "<br>今天是周末";
        break;
      }
     ?>
     <br>
//2.判断当前月份是属于上半年还是下半年
<?php
      $m=12;
      if($m<7){
        echo "<br>该月份属于上半年";
      }
      else{
        echo "<br>该月份属于下半年";
      }
     ?>
  <br>
//3.判断今年是否是闰年
<?php
  $year=date("Y");
  if($year%4==0 && ($year%100!=0 || $year%4==0)) {
    echo "<br>今年是闰年";
  }   
  else{
    echo "<br>今年不是闰年";
  }
?>
<br>
//4.判断所在月份是上中下旬
<?php
  $m=date("m");
  $d=date("d");
  if($d>1 && $d<10){
    echo "<br>今天是".$m."月".$d."日,属于该月上旬";
  }
  else if($d>10 && $d<20){
    echo "<br>今天是".$m."月".$d."日,属于该月中旬";
  }
  if($d>20 && $d<30){
    echo "<br>今天是".$m."月".$d."日,属于该月下旬";
  }
?>

<br>
//5.判断所在月份的天数
<?php
  $month=3;
  $year=2020;
  switch($month){
    case 1:
    case 3: 
    case 5:
    case 7: 
    case 8:
    case 10: 
    case 12:
    echo"<br>该月份有31天";
    break;
    case 4:
    case 6: 
    case 9:
    case 11: 
    echo"<br>该月份有30天";
    break;
    case 2:
      if($year%4==0 && $year%100!=0 || $year%400==0){
        echo"<br>该月份有29天";
      }
      else{
        echo"<br>该月份有28天";
      }
    break;
    default:
    echo "输入有误";
    break;
  }
?>
</body>
</html>