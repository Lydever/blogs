<?php

function receive_form () {
  // global $error_type;
  // 1. 校验客户端提交的数据
  // 1.1. 校验标题
  // empty($_POST['title']) === !(isset($_POST['title']) && $_POST['title'] !== '')
  // empty函数的作用就是判断一个成员是否为空（未定义、值为false）
  if (empty($_POST['title'])) {
    // 标题未正常填写
    $GLOBALS['error_type'] = 'title';
    $GLOBALS['error_msg'] = "填写标题";
    return;
  }

  if (empty($_POST['artist'])) {
    // 歌手未正常填写
    $GLOBALS['error_type'] = 'artist';
    $GLOBALS['error_msg'] = "填写歌手";
    return;
  }

  // ===================================================

  // echo "校验文件";
  // 校验上传文件
  //  1. 校验是否上传成功（error）
  if ($_FILES['source']['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['error_type'] = 'source';
    $GLOBALS['error_msg'] = "上传失败";
    return;
  }

  //  2. 校验上传文件的类型（type）
  $allowed_source_types = array('audio/mp3', 'audio/wma');
  if (!in_array($_FILES['source']['type'], $allowed_source_types)) {
    $GLOBALS['error_type'] = 'source';
    $GLOBALS['error_msg'] = "只能上传音频文件";
    return;
  }

  //  3. 校验文件大小（size）文件的大小单位是字节
  if (1 * 1024 * 1024 > $_FILES['source']['size'] || $_FILES['source']['size'] > 10 * 1024 * 1024) {
    $GLOBALS['error_type'] = 'source';
    $GLOBALS['error_msg'] = "上传文件大小不合理";
    return;
  }

  //  将文件从临时目录中移动到网站下面
  $tmp_path = $_FILES['source']['tmp_name']; // 临时路径
  $dest_path = '../uploads/mp3/' . $_FILES['source']['name']; // 存放路径
  $source = substr($dest_path, 2);
  $moved = move_uploaded_file($tmp_path, $dest_path); // 返回移动是否成功

  if (!$moved) {
    $GLOBALS['error_type'] = 'source';
    $GLOBALS['error_msg'] = "上传失败";
    return;
  }

  // ============= 处理多个文件逻辑 ====================

  // 如果一个文件域是多文件上传的话，文件域的 name 应该是由 [] 结尾
  for ($i = 0; $i < count($_FILES['images']['error']); $i++) {
    // 1. 校验上传成功
    if ($_FILES['images']['error'][$i] !== UPLOAD_ERR_OK) {
      $GLOBALS['error_type'] = 'images';
      $GLOBALS['error_msg'] = "上传图片失败";
      return;
    }
    // 2. 校验文件类型
    $allowed_images_types = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($_FILES['images']['type'][$i], $allowed_images_types)) {
      $GLOBALS['error_type'] = 'images';
      $GLOBALS['error_msg'] = "只能上传图片文件";
      return;
    }
    // 3. 校验大小
    if ($_FILES['images']['size'][$i] > 1 * 1024 * 1024) {
      $GLOBALS['error_type'] = 'images';
      $GLOBALS['error_msg'] = "上传文件大小不合理";
      return;
    }
    // 移动文件
    $img_tmp_path = $_FILES['images']['tmp_name'][$i]; // 临时路径
    $img_dest_path = '../uploads/img/' . $_FILES['images']['name'][$i]; // 存放路径
    $img_moved = move_uploaded_file($img_tmp_path, $img_dest_path); // 返回移动是否成功
    if (!$img_moved) {
      $GLOBALS['error_type'] = 'images';
      $GLOBALS['error_msg'] = "上传图片失败";
      return;
    }

    $images[] = substr($img_dest_path, 2);
  }

  // 2. 保存数据
  $new_song = array(
    'id' => uniqid(), // uniqid 获取一个唯一ID
    'title' => $_POST['title'],
    'artist' => $_POST['artist'],
    'images' => $images,
    'source' => $source
  );
  // 读取已有数据
  $songs = json_decode(file_get_contents('data.json'), true);
  // 追加新数据
  $songs[] = $new_song;
  // 将追加的结果写入文件
  file_put_contents('data.json', json_encode($songs));

  // 3. 响应
  header('Location: /songs/list.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 处理接收校验表单
  receive_form();
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
    <h1 class="display-3">添加新音乐</h1>
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control <?php echo isset($error_type) && $error_type === 'title' ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>">
        <small class="invalid-feedback"><?php echo $error_msg; ?></small>
      </div>
      <div class="form-group">
        <label for="artist">歌手</label>
        <input type="text" class="form-control <?php echo isset($error_type) && $error_type === 'artist' ? 'is-invalid' : ''; ?>" id="artist" name="artist" value="<?php echo isset($_POST['artist']) ? $_POST['artist'] : ''; ?>">
        <small class="invalid-feedback"><?php echo $error_msg; ?></small>
      </div>
      <div class="form-group">
        <label for="images">海报</label>
        <!-- multiple 可以让文件域多选 -->
        <!-- accept 可以指定文件域能够选择的默认文件类型 MIME Type -->
        <!-- image/* 代表所有类型图片 -->
        <!-- 除了使用 MIME 类型 还可以使用文件后缀名限制：.png,.jpg -->
        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <input type="file" class="form-control <?php echo isset($error_type) && $error_type === 'source' ? 'is-invalid' : ''; ?>" id="source" name="source" accept="audio/*">
        <small class="invalid-feedback"><?php echo $error_msg; ?></small>
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>
