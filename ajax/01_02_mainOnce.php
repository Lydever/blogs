<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=$, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $first=include_once("include.php");
      $color='green';
      $second=include_once("include.php");
      var_dump($color);
      echo"<br>";
      var_dump($first);
      echo"<br>";
      var_dump($second);
    ?>
</body>
</html>