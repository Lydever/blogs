<?php

function upload () {
  var_dump($_FILES);
  if (!isset($_FILES['avatar'])) {
    $GLOBALS['message'] = '别玩我了';
    // 客户端提交的表单内容中根本没有文件域
    return;
  }

  $avatar = $_FILES['avatar'];
  // $avatar => array(5) {
  //   ["name"]=>
  //   string(11) "icon-02.png"
  //   ["type"]=>
  //   string(9) "image/png"
  //   ["tmp_name"]=>
  //   string(27) "C:\Windows\Temp\php1138.tmp"
  //   ["error"]=>
  //   int(0)
  //   ["size"]=>
  //   int(4398)
  // }
  echo $avatar['error'];
  if ($avatar['error'] !== UPLOAD_ERR_OK) {
    // 服务端没有接收到上传的文件
    $GLOBALS['message'] = '上传失败';
    return;
  }

  // 接收到了文件
  // 将文件从临时目录移动到网站范围之内
  $source = $avatar['tmp_name']; // 源文件在哪
  // => 'C:\Windows\Temp\php1138.tmp'
  $target = './uploads/' . $avatar['name']; // 目标放在哪
  // => './uploads/icon-02.png'
  // 移动的目标路径中文件夹一定是一个已经存在的目录
  $moved = move_uploaded_file($source, $target);

  if (!$moved) {
    $GLOBALS['message'] = '上传失败';
    return;
  }

  // 移动成功（上传整个过程OK）

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 接收文件 使用一个 叫做 $_FILES 超全局成员
  // var_dump($_FILES);
  upload();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>文件上传</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="avatar">
    <button>上传</button>
    <?php if (isset($message)): ?>
    <p style="color: hotpink"><?php echo $message; ?></p>
    <?php endif ?>
  </form>
</body>
</html>
