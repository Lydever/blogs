<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body>
<center>
    <form action="chkLogin.php" method="post">
        <label for="">用户名:</label><input type="text" name="username" /><br>
        <label for="">密码:</label><input type="password" name="userpwd" /><br>
        <label for="">身份:</label><select name="role" id=""><br>
            <option value="student">学生</option>
            <option value="teacher">教师</option>
        </select><br>

        <input type="submit" value="确定" />
        <input type="reset" value="重置" />
    </form>
</center>
</body>
</html>
