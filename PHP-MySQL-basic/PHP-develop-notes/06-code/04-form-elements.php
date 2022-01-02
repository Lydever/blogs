<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  var_dump($_POST);
}

// $foo[] = 1

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>表单</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <!-- <input type="text" name="key1" id=""> -->
    <!-- <input type="password" name="key1" id="">
    <input type="email" name="key1" id="">
    <input type="number" name="key1" id="">
    <input type="number" name="key1" id=""> -->
    <!-- <textarea name="key2" id="" cols="30" rows="10"></textarea> -->

    <!-- 当表单中使用了 radio ，一定要为相同 name 的 radio 设置不同的 value，让服务端可以辨别 -->
    性别
    <label><input type="radio" name="gender" value="male"> 男</label>
    <label><input type="radio" name="gender" value="female"> 女</label>

    <br>

    <!-- checkbox 如果没有选中则不会提交，如果选中提交 on -->
    <label><input type="checkbox" name="agree" value="true"> 同意协议</label>

    <br>

    <label><input type="checkbox" name="funs[]" value="football"> 足球</label>
    <label><input type="checkbox" name="funs[]" value="basketball"> 篮球</label>
    <label><input type="checkbox" name="funs[]" value="earth"> 地球</label>

    <br>


    <select name="status">
      <option>激活</option>
      <option>未激活</option>
      <option value="1">待激活</option>
    </select>


    <br>

    <input type="file" name="" id="">


    <button>提交</button>

  </form>
</body>
</html>
