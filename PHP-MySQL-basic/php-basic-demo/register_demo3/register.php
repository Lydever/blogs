<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>登录</title>
</head>
<body>
        <form action="login.php">
                <label>用户名:<input type="text" value="" name="name" /></label>
                <label>密码:<input type="password" name="pw" /></label>
                 <label>确认密码:<input type="password" name="pw" /></label>
                <button type="subimt" name="register">注册</button>
        </form>
        <?php 
        include("database.php");
        if (!isset($_POST['submit'])) {
                exit('非法访问!');
        }


        $name = $_POST['name'];
        $pw = $_POST['pw'];
        $checked = mysql_query("select * from register where name='$name' and pw='$pw'");
        $res = mysql_fecth_array($checked);
        if($res){
                echo '登录成功!'
        }else{
                echo "登录失败!";
        }
         ?>
</body>
</html>