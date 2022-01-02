<?php

// PHP 中可以通过 define 函数定义 一个常量
// 常量的特点就是：定义后不能被修改，也是临时存放数据的容器
// 什么时候用常量：一般程序的配置信息（不会在运行过程中修改）都会在常量中定义
// what why how where when

// 变量或函数都是采用 snake_case （小写字母加下划线）命名规则
// 常量是 SNAKE_CASE 命名规则
// 第一个参数常量名称
// 第二个是常量的值
define('SYSTEM_NAME', '阿里百秀');
// 第三个参数是常量名称是否忽略大小写 默认为false 不忽略
define('SYSTEM_VERSION', '1.0', true);

echo SYSTEM_NAME;
// echo system_name;


echo SYSTEM_VERSION;
echo system_version;
