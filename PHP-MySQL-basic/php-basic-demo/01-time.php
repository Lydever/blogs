<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php字符串处理</title>
</head>
<body>
<?php

//1.通过代码设置时区
date_default_timezone_set('PRC');

echo "<br>";
//time 获取到的是 秒数为单位的时间戳
echo time();

//格式化一个时间戳
//第一个参数是时间格式
//第二个参数是时间戳
echo date('Y-m-d H:i:s',time());



$str = '2020-04-08 15:25:34';
//对已有时间作格式化
//strtotime 可以对一个有字符串的时间转化为时间戳
$timestamp = strtotime($str);
echo date('Y年m月d日 H:i:s',$timestamp);

?>
</body>
</html>