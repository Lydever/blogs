<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   var_dump($_POST);
// }

// 1. 请求的方式不同
// 2. 传参方式不同，get 用 url 传参数，post 用 请求体 传参

var_dump($_GET);
var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>登录</title>
</head>
<body>
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
