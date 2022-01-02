<?php

// 能通过PHP代码执行一个SQL语句得到查询的结果
// mb_strlen(str)
// 类似于之前的宽字符集函数问题，mysqli是一个额外的扩展
// 如果想要使用这个扩展提供的函数，必须开启扩展
// extension_dir
// 解除注释 extension=php_mysqli.dll
//
// 如果需要在调用函数时忽略错误或者警告可以在函数名之前加上 @

// 1. 建立与数据库服务器之间的连接
$connection = mysqli_connect('127.0.0.1', 'root', '123456', 'demo2');

if (!$connection) {
  // 连接数据库失败
  exit('<h1>连接数据库失败</h1>');
}

// 基于刚刚创建的连接对象执行一次查询操作
// 得到的是一个查询对象，这个查询对象可以用来再到数据一行一行拿数据
$query = mysqli_query($connection, 'select * from users;');
// var_dump($query);

// 等着三蹦子去取数据  取一行
// $row = mysqli_fetch_assoc($query);
// while ($row) {
//   var_dump($row);
//   $row = mysqli_fetch_assoc($query);
// }
// var_dump($row);

// while
//

while ($row = mysqli_fetch_assoc($query)) {
  var_dump($row);
}
