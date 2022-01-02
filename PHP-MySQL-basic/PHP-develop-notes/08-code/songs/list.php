<?php

// PHP 的价值：
// 通过执行某些PHP代码获取到指定的数据，填充到HTML的指定位置

$json = file_get_contents('data.json');

$data = json_decode($json, true);

if (!$data) {
  // JSON 格式不正确
  exit('数据文件异常');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>音乐列表</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">音乐列表</h1>
    <hr>
    <div class="mb-3">
      <a href="add.php" class="btn btn-secondary btn-sm">添加</a>
    </div>
    <table class="table table-bordered table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th class="text-center">标题</th>
          <th class="text-center">歌手</th>
          <th class="text-center">海报</th>
          <th class="text-center">音乐</th>
          <th class="text-center">操作</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php foreach ($data as $item): ?>
        <tr>
          <td class="align-middle"><?php echo $item['title']; ?></td>
          <td class="align-middle"><?php echo $item['artist']; ?></td>
          <td class="align-middle">
            <?php foreach ($item['images'] as $src): ?>
            <img src="<?php echo $src; ?>" alt="">
            <?php endforeach ?>
          </td>
          <td class="align-middle"><audio src="<?php echo $item['source']; ?>" controls></audio></td>
          <td class="align-middle"><a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $item['id']; ?>">删除</a></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
