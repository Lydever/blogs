<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php跳转语句</title>
</head>
<body>
3.找出1-100中所有能被7整除的数。<br>
<?php
$i;
echo"1-100中所有能被7整除的数有:";
for($i=1;$i<100;$i++){
    if($i%7==0){   
        echo  $i." &nbsp";  
     continue;
    } 
}
?><br><br><br>

4.编写程序判断2019是否为素数。<br>
<?php
$i=2019;
$flag=false;
for($j=2;$j<=$i-1;$j++){
    if($i%$j==0){
        $flag=true;
    break;
    }
}
if($flag){
    echo $i."是素数";
}else{
    echo $i."不是素数";
}
?><br><br><br>
5.编写程序计算1+3+5+..+99的结果。<br>
<?php
$i;
$s=0;
for($i=1;$i<100;$i+=2){
    $s+=$i;
    if($i>100) break;
}echo $s;
?><br><br><br>
<?php
for($i = 1; $i <= 10;$i++){
if($i == 5){
break;
}
echo $i. "<br/>";
}
?>

<?php
$a=0;
while (++$a){
switch ($a)
{
case 5:
echo "At 5<br/>\n";
break 1;
case 10:
echo "At 10; quitting<br/>\n";
break 2;
default: 
echo $a. "<br/>";
break;
}
}
?>

<?php
for($i = 1; $i <= 10;$i++) {
if($i == 5) {
continue;
}
echo $i. "<br/>";
}
?>

<?php
$a=0;
while ($a++<5){
echo "外层<br>\n";
while (1){
echo" &nbsp; &nbsp;中间层<br>\n";
while (1)
{
echo "&nbsp; &nbsp; &nbsp;&nbsp;内层<br>\n";
$a=6;
continue 3;
}
echo "我永远不会被输出的. <br>\n";
}
echo "我也是不会被输出的. ";
}
echo "PHP";
?>
</body>
</html>