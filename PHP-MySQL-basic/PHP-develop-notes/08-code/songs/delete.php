<?php

// 如何知道客户端想要删除哪一个？？？
// 通过客户端在URL地址中的问号参数的不同来辨别要删除的数据

// 接收 URL 中的不同的 ID
if (empty($_GET['id'])) {
  // 没有传递必要的参数
  exit('<h1>必须指定参数</h1>');
}

$id = $_GET['id'];

// 找到要删除的数据
$data = json_decode(file_get_contents('data.json'), true);
foreach ($data as $item) {
  // 不是我们要的之间找下一条
  if ($item['id'] !== $id) continue;
  // $item => 我们要删除的那一条数据

  // 从原有数据中移除
  $index = array_search($item, $data);
  array_splice($data, $index, 1);

  // 保存删除指定数据过后的内容
  // echo '<pre>';
  // var_dump($data);
  // echo '</pre>';
  $json = json_encode($data);
  file_put_contents('data.json', $json);

  // 跳转回列表页
  header('Location: list.php');
}

