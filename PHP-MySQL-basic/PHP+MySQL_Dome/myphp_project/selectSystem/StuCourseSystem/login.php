<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<center>
<h1>登录</h1>
<hr><br/><br/>
<form action="../chkLogin.php" method="post">
    用 户 名：
    <input type="text" name="username" size="20" maxlength="15" value="请填写用户名" />
    <br/> <br/>
    登录密码：
    <input type="password" name="password" size="20" maxlength="15" />
    <br/><br/>
    <label >身份类型:</label>
    <select name="role" id="role">
        <option value="student">学生</option>
        <option value="teacher">教师</option>
    </select>
    <br/><br/>
    <input type="submit" value="登录" />
    <input type="reset" value="重填" />
</form>
</center>
</body>
</html>

