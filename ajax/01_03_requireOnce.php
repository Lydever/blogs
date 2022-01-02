<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $first=require_once("require.php");
      $color='green';
      $second=require_once("require.php");
      var_dump($color);
      echo"<br>";
      var_dump($first);
      echo"<br>";
      var_dump($second);
    ?>
</body>
</html>