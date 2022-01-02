<?php

// 类型：  1. 索引数组  2. 关联数组
// 方式：  1. array()  2. [] (PHP 5.4)

$dict = array(
  'hello' => '你好',
  'hello1' => '你好',
  'hello2' => '你好',
);

// var_dump(array_keys($dict));
// // => ['hello', 'hello1', 'hello2']

// var_dump(array_values($dict));
// // => ['你好', '你好', '你好']

// var_dump(array_key_exists('hello', $dict));
// var_dump(array_key_exists('hello4', $dict));

// 只有当 php.ini 中 display_errors = On 时候
// 才会在界面上显示 notice 错误
// 开发阶段一定设置为 On 生产阶段（上线）设置为 Off

// isset 也可判断数组中是否有指定的键
// 这种类似于 JavaScript 的方式虽然可以达到效果，但是会有警告
// if ($dict['foo']) {
//   echo $dict['foo'];
// } else {
//   echo '没有';
// }

// isset 会吞掉 Undefined index 的警告
if (isset($dict['foo'])) {
  echo $dict['foo'];
} else {
  echo '没有';
}
// isset($dict['foo'])
// $dict['foo'] =>
// isset()

// empty($dict['foo']) 相当于 !isset($dict['foo']) || $dict['foo'] == false
if (empty($dict['foo'])) {
  echo '没有';
} else {
  echo $dict['foo'];
}


// empty 的实现
// function empty ($input) {
//   return !isset($input) || $input == false
// }
