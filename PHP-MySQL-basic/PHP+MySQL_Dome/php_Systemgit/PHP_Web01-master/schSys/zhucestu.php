<!DOCTYPE html>
<html>
<head>
	<title>学生注册</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background: url(img/indeximg2.jpg) no-repeat;
			background-size: cover ;
			background-position: center center;
			background-attachment: fixed;		
		}
		p{
			font-weight: bolder;
			font-size: 30px;
			margin-left: 105px;
			font-family: "黑体";
			color:white;
			text-shadow: 5px 5px 5px black;
		}
		div{
			width: 550px;
			height: 640px;
			margin-top: 70px;
			margin-left: 60px;
			padding-top: 10px;
			background-color:rgba(0,0,0,0.2);
			border-radius: 10px;
		}
		table{
			padding-top:0px;
			padding-left: 70px;
		}
		.t0{
			width:120px;
			display: inline-block;
			margin-bottom: 20px;
			padding-top: 15px;
			color: white;
			text-align: right;
			text-shadow: 5px 5px 5px black;
			font-size: 15px;			
		}
		.t1{
			margin-left:-250px;
			height:24px;
			width:200px;
			margin-top: 15px;
			margin-bottom: 15px;
			border-radius: 3px;
			border:0px;
		}
		.t2{
			border-radius:2px 2px;
			color:white;
			font-family: "黑体";
			background-color:rgba(0,0,0,0.5);
			border:0px;
			width:80px;
			height:40px;
			margin-left:40px;
			margin-top:30px;
			font-size: 18px;
			text-shadow: 5px 5px 5px black;
		}
		.t3{
			margin-left: 125px;
		}
	</style>
</head>
<body>
	<div>
		<form name="login" id="login" method="post">
		<table border="0" cellspacing="0" cellpadding="0">
		<p>[学生注册]</p>
		<tr class='t1'>
    		<td class="t0">用户名：</td>
    		<td>
    			<input type="text" placeholder="请输入用户名" name="username" id="username" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">学号：</td>
    		<td>
    			<input type="text" placeholder="请输入学号" name="sno" id="sno" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">姓名：</td>
    		<td>
    			<input type="text" placeholder="请输入姓名" name="name" id="name" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">性别：</td>
    		<td>
    			<input type="text" placeholder="请输入性别" name="sex" id="sex" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">院系：</td>
    		<td>
    			<input type="text" placeholder="请输入院系" name="dept" id="dept" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">专业：</td>
    		<td>
    			<input type="text" placeholder="请输入专业" name="major" id="major" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">密码：</td>
    		<td>
    			<input type="password" placeholder="请输入密码" name="password1" id="password1" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td class="t0">再输一次密码：</td>
    		<td>
    			<input type="password" placeholder="请再次输入密码" name="password2" id="password2" class="t1" required="required">
    			<span style="color: rgba(176,0,0);font-size: 24px;">*</span>
    		</td>
    	</tr>
    	<tr>
    		<td colspan="2" align="center" class="t3">
          		<input name="zhuce" type="submit" value="注册" class="t2">
          		<input name="reset" type="reset" value="重置" class="t2">
          		<a href="zhuce" target="_self"><input type="button" name="return" id="return" class="t2" value="返回"></a>
        	</td>
    	</tr>  
			</table>
		</form>
	</div>
	<?php 
		$link=mysqli_connect('localhost','root','root','schsys','3306');
		mysqli_set_charset($link,'utf8');
		if (!$link){
    		echo"<script>alert('数据库连接失败！')</script>";
		}
			if(isset($_POST['zhuce']))
			{
				$username=$_POST['username'];
				$sno=$_POST['sno'];
				$name=$_POST['name'];
				$sex=$_POST['sex'];
				$dept=$_POST['dept'];
				$major=$_POST['major'];
				$password1=$_POST['password1'];
				$password2=$_POST['password2'];
				$role='学生';
				
				$result0=mysqli_query($link,"select * from user where username='$username'");
				$result1=mysqli_query($link,"select * from s where username='$username'");
				$result2=mysqli_query($link,"select * from s where sno='$sno'");

				if($password1==$password2)
				{
					if(mysqli_num_rows($result0) || mysqli_num_rows($result1)==1)
					{
						echo"<script>alert('该用户名已存在！')</script>";
						exit();	
					}
					else
					{
						if(mysqli_num_rows($result2)==1)
						{
							echo"<script>alert('该学号已存在！')</script>";
							exit();
						}
						else
						{
							mysqli_query($link,"insert into s values ('$username','$sno','$name','$sex',NULL,NULL,'$dept','$major','0')");
							mysqli_query($link,"insert into user values ('$username','$password1','$role')");
							echo"<script>alert('注册成功！')</script>";
						}						
					}
				}		
				else
				{
					echo"<script>alert('两次输入的密码不一致，请重新输入！')</script>";					
				}					
			}
			mysqli_close($link);
	 ?>	
</body>
</html>