<?php

if (isset($_GET['action']) && $_GET['action'] === 'close-ad') {
  // 不想看到广告
  setcookie('hide_ad', '1');
  $_COOKIE['hide_ad'] === '1';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    .ad {
      height: 200px;
      background-color: #ff0;
    }

    .ad a {
      float: right;
    }
  </style>
</head>
<body>
  <?php if (empty($_COOKIE['hide_ad']) || $_COOKIE['hide_ad'] !== '1'): ?>
  <div class="ad">
    <!-- <a href="close.php">不再显示</a> -->
    <a href="index.php?action=close-ad">不再显示</a>
  </div>
  <?php endif ?>
</body>
</html>
