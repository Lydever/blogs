<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 表单处理三部曲
  // 1. 接收并校验
  // 2. 持久化（将数据持久保存到磁盘）
  // 3. 响应（服务端的反馈）

  // 接收用户提交的数据，保存到文件

  // 任何在客户端的东西都不能信

  // 1. 校验参数的完整性
  if (empty($_POST['username'])) {
    // 没有提交用户名 或 用户名为空字符串
    $message = '会不会玩';
  } else {

    if (empty($_POST['password'])) {
      $message = '请输入密码';
    } else {

      if (empty($_POST['confirm'])) {
        $message = '请输入确认密码';
      } else {
        // 用户名 密码 确认密码都输入了

        if ($_POST['password'] !== $_POST['confirm']) {
          $message = '两次输入的密码不一致';
        } else {

          if (!(isset($_POST['agree']) && $_POST['agree'] === 'on')) {
            $message = '必须同意注册协议';
          } else {
            // 所有的校验都OK

            $username = $_POST['username'];
            $password = $_POST['password'];

            // 将数据保存到文本文件中
            file_put_contents('users.txt', $username . '|' . $password . "\n", FILE_APPEND);
            $message = '注册成功';

          }

        }

      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>注册</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table border="1">
      <tr>
        <td><label for="username">用户名</label></td>
        <td><input type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"></td>
      </tr>
      <tr>
        <td><label for="password">密码</label></td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td><label for="confirm">确认密码</label></td>
        <td><input type="password" name="confirm" id="confirm"></td>
      </tr>
      <tr>
        <td></td>
        <td><label><input type="checkbox" name="agree" value="on"> 同意注册协议</label></td>
      </tr>
      <?php if (isset($message)): ?>
      <tr>
        <td></td>
        <td><?php echo $message; ?></td>
      </tr>
      <?php endif ?>
      <tr>
        <td></td>
        <td><button>注册</button></td>
      </tr>
    </table>
  </form>
</body>
</html>
