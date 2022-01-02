<?php

// echo 'value1', 'value2';

// // print 只能打印一个数据
// print 'value1';


// 一般调试的时候用于输出数据以及数据类型
// var_dump('value1');

// echo false;

// var_dump(false);

// var_dump(array(
//   '1', '2'
// ));

// php 5.4 +
$arr = [1, 2, 3, 4];
foreach ($arr as $value) {
  # code...
}

$assoc = ['key1' => 'value', 'key2' => 'value', 'key3' => 'value'];
foreach ($assoc as $key => $value) {
  # code...
}
