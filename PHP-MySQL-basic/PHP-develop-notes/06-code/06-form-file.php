<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 接收文件 使用一个 叫做 $_FILES 超全局成员
  var_dump($_FILES);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <!-- 如果一个表单中有文件域（文件上传），必须将表单的 method 设置为 post, enctype 设置为 multipart/form-data -->
  <!-- enctype 默认是 urlencoded 格式 key1=value1&key2=value2 -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

    <!-- <input type="text" name="foo">
    <input type="text" name="bar"> -->
    <input type="file" name="img">

    <button>提交</button>

  </form>
</body>
</html>
