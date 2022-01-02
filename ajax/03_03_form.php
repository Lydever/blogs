
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户注册登录</title>
</head>
<body>
	<form action="03_03_form.php" class="text-center" method='post' style="background-color:#a0cedb;width: 380px;height:260px;border: 1px #7b7b7b solid">
			<div class="input-group">
				<label class="">用户名:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>   
				<input type="text" class="form-control" name="username" /><span class="">&nbsp@&nbsp</span>
			     <select  name="status">
                    <option >163.com</option>
                    <option >qq.com</option>
                    <option >126.com</option>
                    <option >sina.com</option>
                 </select>
			</div>

			<div class="input-group">
				<label class="">登录密码:&nbsp&nbsp&nbsp</label>
				<input type="password" class="form-control" name="password" />
			</div>
			<div class="input-group">
				<label class="">确认密码:&nbsp&nbsp&nbsp</label>
				<input type="password" class="form-control" name="confirm" />
			</div>
			<div class="input-group">
				<label class="">您的性别是：</label>
                <input type="radio" name="sex" id="radio1" 
				value="男" checked="checked" />男
                <input type="radio" name="sex" id="radio2" value="女" />女
			</div>
			<div class="input-group">
				<label class="">个人爱好：</label>
                <input type="checkbox" name="interest[]" value="音乐" />音乐
	            <input type="checkbox" name="interest[]" value="游戏" />  游戏
                <input type="checkbox" name="interest[]" value="电影" /> 
			</div>
			<div class="input-group">
				<label class="">个人相片：</label>
                <input type="file" name="myphotos" size="60" />
			</div>
			<div class="input-group">
				<label class="">备注信息：</label>
                <textarea name="infor" type="text" rows="3" cols="20" >
                </textarea>
			</div>
			<br>
			<div class="input-group">
				<input type="submit" name="sub" value="提交表单" />
				<input type="button" name="rewrite" value="重新填写" />
			</div>		
	</form>

<?php

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if($_POST['sub']=='提交表单'){
		$username = $_POST['username'];
        echo '<br>您填写的用户名为:'.$username;		
		$status = $_POST['status'];
        echo '<br>您注册的邮箱域名为:'.$status; 		
		$password = $_POST['password'];
        echo '<br>您填写的密码为:'.$password; 		
		$confirm = $_POST['confirm'];
        echo '<br>您填写的确认密码为:'.$confirm;		
		$usersex = $_POST['sex'];	
        echo '<br>您填写的性别为:'.$usersex; 	
        echo '<br>您填写的兴趣爱好为:'; 
      	if(($_POST['interest']!= null)){         
	      for($i = 0;$i<count($_POST['interest']);$i++)
	         	echo $_POST['interest'][$i].'&nbsp;&nbsp;';			
	    }	    	
		$infor = $_POST['infor'];
        echo '<br>您填写的备注信息为:'.$infor; 
	}
		 
}
?>
</body>
</html>
