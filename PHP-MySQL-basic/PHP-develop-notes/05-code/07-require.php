<?php

// // 类似 CSS 的 import 导入文件
// require 'config.php';
// // require 可以用于在当前脚本中载入一个别的脚本文件并且执行他
// // require 在每一次调用时都会载入对应的文件

// echo SYSTEM_NAME;

// require 'config.php';

// echo SYSTEM_NAME;

// require_once ==================================
// require_once 如果之前载入过，不再执行（只执行一次）
// 由于类似于 定义常量 定义函数 这种操作不能执行多次
// 所以 require_once 更加合适载入这种文件

require_once 'config.php';

echo SYSTEM_NAME;

require_once 'config.php';

echo SYSTEM_NAME;
