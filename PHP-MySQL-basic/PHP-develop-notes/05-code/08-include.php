<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <!-- require 特点： 一旦被载入的文件不存在就会报一个致命错误，当前文件不再往下执行 -->
  <!-- include 特点： 载入文件不存在不会报错误（会有警告，警告不用管），当前文件继续执行 -->
  <?php include 'aside.php'; ?>
  <main>
    这是主要的区域
  </main>
</body>
</html>
