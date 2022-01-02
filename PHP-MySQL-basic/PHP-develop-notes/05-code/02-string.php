<?php

// PHP 所有能力都是函数，内置1000多个函数

$str = 'hello';
// 获取字符串长度

echo strlen($str);

echo '<br>';

// 获取中文字符串（宽字符）的长度
// strlen 只能获取拉丁文的长度
// 内置成员函数直接使用
echo strlen('你好');

echo '<br>';

// PHP 中专门为 宽字符集 添加了一套 API
// 这一套 API 不在内置的 1000+ 里面，而是在一个模块（php_mbstring.dll）中
// 模块成员必须通过配置文件载入模块过后再使用
// 所有的API 都是 mb_xxxx
echo mb_strlen('你好');


// 配置 PHP 扩展的步骤
// 1. 在 PHP 的安装目录去创建一个 php.in
// 2. extension_dir
// 3. ;extension=php_mbstring.dll
// 4. 默认Apache加载的php.ini 是去 Windows目录找的
// 5. 可以通过 Apache 的配置文件修改默认加载路径 PHPIniDir
