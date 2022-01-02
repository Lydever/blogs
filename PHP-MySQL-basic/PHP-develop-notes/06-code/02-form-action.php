<?php

// // 将表单的处理逻辑放在HTML之前，为了更灵活的控制 HTML 的输出
// var_dump($_POST);
// 因为对于表单的处理逻辑不是每一次都需要执行，
// 所以一般我们会判断请求的方式，从而决定是否执行对数据的处理

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 请求的方式是 POST，当前是点击按钮产生的请求
  var_dump($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>登录</title>
</head>
<body>
  <!-- 一般为了便于维护，我们将表单提交给当前页面本身 -->
  <!-- <form action="02-form-action.php" method="post"> -->
  <!-- 由于文件重命名会导致代码修改，鲁棒性不强 -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
      <label for="username">用户名</label>
      <input type="text" id="username" name="username">
    </div>
    <div>
      <label for="password">密码</label>
      <input type="password" id="password" name="password">
    </div>
    <button type="submit">登录</button>
  </form>
</body>
</html>
