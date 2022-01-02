<?php

// 1. 通过代码设置时区，更推荐
date_default_timezone_set('PRC');
// 2. 通过配置文件设置时区
// date.timezone = PRC

// // time 获取到的是 秒数为单位的时间戳
// echo time();

// echo '<br>';
// // 格式化一个时间戳
// // 第一个参数是一个时间格式
// // 第二个参数是一个时间戳
// // 默认时间戳获取的就是格林威治时间
// echo date('Y-m-d H:i:s', time());

$str = '2017-10-22 15:18:58';

// 对已有时间做格式化
// strtotime 可以用来将一个有格式的时间字符串 转换为一个 时间戳
$timestamp = strtotime($str);

// 注意单引号字符串问题
echo date('Y年m月d日<b\r>H:i:s', $timestamp);
