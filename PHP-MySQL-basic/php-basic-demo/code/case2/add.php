<?php

/**
 * 只是在表单提交时执行
 */
function add_music () {
  // 目标
  //  将用户提交过来的数据保存到 storage.json 中
  // 步骤
  //  1. 接收并校验
  //  2. 持久化
  //  3. 响应

  // 文本框校验
  // =====================================================

  if (empty($_POST['title'])) {
    $GLOBALS['error_message'] = '请输入标题';
    return;
  }

  if (empty($_POST['artist'])) {
    $GLOBALS['error_message'] = '请输入歌手';
    return;
  }

  // 校验上传文件
  // =====================================================

  if (empty($_FILES['source'])) {
    // 客户端提交的表单中没有 source 文件域
    $GLOBALS['error_message'] = '请正确提交文件';
    return;
  }

  $source = $_FILES['source'];

  // 判断用户是否选择了文件
  if ($source['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['error_message'] = '请选择音乐文件';
    return;
  }

  // 校验文件的大小
  if ($source['size'] > 10 * 1024 * 1024) {
    $GLOBALS['error_message'] = '音乐文件过大';
    return;
  }

  if ($source['size'] < 1 * 1024 * 1024) {
    $GLOBALS['error_message'] = '音乐文件过小';
    return;
  }

  // 校验类型
  $allowed_types = array('audio/mp3', 'audio/wma');
  if (!in_array($source['type'], $allowed_types)) {
    $GLOBALS['error_message'] = '这是不支持的音乐格式';
    return;
  }

  // 音乐文件已经上传成功，但是还在临时目录中
  // 一般情况会将上传的文件重命名
  $target = './uploads/' . uniqid() . '-' . $source['name'];
  if (!move_uploaded_file($source['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传音乐失败';
    return;
  }

  // =========== 接收图片 ==============

  if (empty($_FILES['images'])) {
    // 客户端提交的表单中没有 source 文件域
    $GLOBALS['error_message'] = '请正确提交文件';
    return;
  }

  $images = $_FILES['images'];

  // 判断用户是否选择了文件
  if ($images['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['error_message'] = '请选择图片文件';
    return;
  }

  // 校验文件的大小

  if ($images['size'] > 1 * 1024 * 1024) {
    $GLOBALS['error_message'] = '图片文件过大';
    return;
  }

  // 校验类型
  $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
  if (!in_array($images['type'], $allowed_types)) {
    $GLOBALS['error_message'] = '这是不支持的图片格式';
    return;
  }

  // 音乐文件已经上传成功，但是还在临时目录中
  // 一般情况会将上传的文件重命名
  $target = './uploads/' . uniqid() . '-' . $images['name'];
  if (!move_uploaded_file($images['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传图片失败';
    return;
  }

  // 图片音乐都上传成功
  $title = $_POST['title'];
  $artist = $_POST['artist'];
  $images = '图片';
  $source = '音乐';

  $origin = json_decode(file_get_contents('storage.json'), true);

  $origin[] = array(
    'id' => uniqid(),
    'title' => $_POST['title'],
    'artist' => $_POST['artist'],
    'images' => '123',
    'source' => '1231',
  );

  $json = json_encode($origin);

  file_put_contents('storage.json', $json);

  // 跳转回列表页
  header('Location: list.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  add_music();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加新音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">添加新音乐</h1>
    <hr>
    <?php if (isset($error_message)): ?>
    <div class="alert alert-danger" role="alert">
      <?php echo $error_message; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="artist">歌手</label>
        <input type="text" class="form-control" id="artist" name="artist">
      </div>
      <div class="form-group">
        <label for="images">海报</label>
        <input type="file" class="form-control" id="images" name="images">
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <!-- accept 可以限制文件域能够选择的文件种类，值是 MIME Type -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>
