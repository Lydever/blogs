<?php

// 找一个属于当前访问者的箱子
// 并且把箱子的钥匙（session_id）交给用户（cookie）
session_start();

if (empty($_SESSION['num']) || empty($_GET['num'])) {
  $num = rand(0, 100);
  // 存在 cookie 中不保险，存在服务端的箱子里
  $_SESSION['num'] = $num;
} else {
  $count = empty($_SESSION['count']) ? 0 : $_SESSION['count'];

  if ($count < 10) {
    $result = (int)$_GET['num'] - $_SESSION['num'];
    if ($result == 0) {
      $message = '猜对了';
      unset($_SESSION['num']);
      unset($_SESSION['count']);
    } elseif ($result > 0) {
      $message = '太大了';
    } else {
      $message = '太小了';
    }

    $_SESSION['count'] = $count + 1;
  } else {
    $message = 'looooooooooooow!';
    unset($_SESSION['num']);
    unset($_SESSION['count']);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个0~100的数字，你需要在仅有的10机会之内猜对它。</p>
  <?php if (isset($message)): ?>
  <p><?php echo $message; ?></p>
  <?php endif ?>
  <form action="session.php" method="get">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
  </form>
</body>
</html>
