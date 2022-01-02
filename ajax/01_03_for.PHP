<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php2-2-2循环语句</title>
</head>
<body>
//用for,while,do...while三种语句实现1--100的数字,每10个数字换行<br>
//用for实现<br>
<?php
  $i;
  $j;
  $s=0;
 for($i=1;$i<100;$i++){
     for($j=1;$j<10;$j++){
         $s=$i++;
         echo $s."  &nbsp";
     }
            echo "<br>";  
 }
?>
//用while实现<br>
<?php
  $i=0;
  while($i<100){
          $i++;
          echo $i."  &nbsp";
          if($i%10==0){
            echo "<br>";  
          } 
          else if($i/10==9){
            echo "<br>";  
          } 
  }
?>
//用do...while实现
<?php
  $i=0;
do{
    $i++;
    echo $i."  &nbsp";
    if($i%10==0){
    echo "<br>";
  }
}
  while($i<100);
?>
<br>
<br>
//2.求100旳阶乘<br>
    <?php
      $sum=1;
      for($i=1;$i<=100;$i++){
          $sum*=$i;
          echo $sum." &nbsp";
      }
      echo $sum." &nbsp";
    ?>
<br><br>

//4.编写程序实现九九乘法表<br>
<?php
echo '<table width="999" border="1">';
for($i=1;$i<10;$i++){
    for($j=1;$j<=$i;$j++){
        echo '<td align="center">'.$j.'X'.$i.'='.($i*$j).'</td>';
    }
    echo '<br>'.'</tr>';
}
echo '</table>'.'<br>';
?>
<br>

//3.1+2+3+...+n>=1000,求n的最小值<br>
<?php
 $i;
 $sum=0;
 $n;
 for($i=1;$i<1000;$i++){
     $sum=$sum+$i;
     if($sum>1000){
         $n=$i;
     break;
     }
 }
 echo $n;
?>

</body>
</html>