<?php 

//打开counter.txt文件
$fopen = fopen("counter.txt", "r+");
//获取字节数据
$counter = fgetc($fopen);

// 给counter 赋值 +1
$counter = doubleval($counter)+1;
fseek($fopen,0);

//将+1的counter值放回counter.txt中
fputs($fopen,$counter);

//关闭文件
fclose($fopen);




 ?>