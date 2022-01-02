<!DOCTYPE html>
<html>
<head>
	<title>老师修改密码</title>
	<link rel="stylesheet" type="text/css" href="css/teachangepw">
</head>
<body>
	<header>
		<div class="p1">江西师范大学教务在线
			<input type="button" name="zhuxiao" id="zhuxiao" value="注销" onclick="location.href='logout.php'">
		</div>
	</header>
	<div class="left">
		<div class="cd">菜单选项</div>
		<div id="menu">
			<ul class="box">
				<li class="teaxx"><a href="teaindex.php" class="xx">基本信息</a></li>
				<li class="teas"><a href="teaselectsc.php" class="xx">查看班级学生</a></li>
				<li class="teagrade"><a href="teamark.php" class="xx">学生评分</a></li>
				<li class="stuchange">
					<a href="#" class="xx">修改信息</p>
					<ul>
						<li><a href="teachangeage.php" class="xx">修改年龄</a></li>
						<li><a href="teachangetel.php" class="xx">修改联系方式</a></li>
					</ul>
				</li>
				<li class="changepw"><a href="teachangepw.php" class="xx">修改密码</a></li>
			</ul>
		</div>
	</div>
	<div class="right">
	<?php 
			session_cache_limiter('nocache');//不清空表单，只在session生效期间
			session_start();
			
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";

			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}
			if(isset($_POST['submit'])){

				$oldpw=$_POST['oldpw'];
				$newpw1=$_POST['newpw1'];
				$newpw2=$_POST['newpw2'];

				$result1=mysqli_query($link,"select * from user where username='$username' and password='$oldpw' ");

				if(mysqli_num_rows($result1)==1){
					if('$newpw1'=='$oldpw' && '$newpw2'=='$oldpw'){
						echo"<script>alert('新密码不能与旧密码相同，请重新输入！');window.history.go(-1)</script>";
						exit();
					}else{
						if($newpw1==$newpw2){
							$result2=mysqli_query($link,"update user set password='$newpw1' where username='$username' ");
							if($result2==1){
								echo"<script>alert('修改密码成功！');window.history.go(-1)</script>";
							}
						}else{
								echo"<script>alert('两次输入密码不同，请重新输入！');window.history.go(-1)</script>";
								exit();		
							 }
					}
				}
				else{
					echo"<script>alert('原密码输入错误，请重新输入！');window.history.go(-1)</script>";
					exit();
				}			
			}
			mysqli_close($link);			
		 ?>
		<form name="teaxgpw" id="teaxgpw" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>请输入原密码：</td>
					<td>
						<input type="password" name="oldpw" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				</tr>
				<tr>
					<td>请输入新密码：</td>
					<td>
						<input type="password" name="newpw1" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				<tr>
					<td>请再次输入新密码：</td>
					<td>
						<input type="password" name="newpw2" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
			</table>
			<td><input type="submit" name="submit" value="确认修改" class="sb"></td>			
		</form>		
	</div>	
</body>
</html>