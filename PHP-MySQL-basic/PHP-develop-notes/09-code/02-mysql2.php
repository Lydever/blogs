<?php

// 查询数据的查询语句

// 1. 建立与数据库服务器之间的连接
$connection = mysqli_connect('127.0.0.1', 'root', '123456', 'demo2');

// 1. 必须在查询数据之前
// 2. 必须传入连接对象和编码
mysqli_set_charset($connection, 'utf8');
// mysqli_query($connection, 'set names utf8;');

if (!$connection) {
  // 连接数据库失败
  exit('<h1>连接数据库失败</h1>');
}

// 基于刚刚创建的连接对象执行一次查询操作
$query = mysqli_query($connection, 'select * from users;');

if (!$query) {
  exit('<h1>查询失败</h1>');
}

// 遍历结果集
while ($row = mysqli_fetch_assoc($query)) {
  var_dump($row);
}

// 释放查询结果集
mysqli_free_result($query);

// 炸桥 关闭连接
mysqli_close($connection);
