<!DOCTYPE html>
<html>
<head>
	<title>系统管理员修改密码</title>
	<link rel="stylesheet" type="text/css" href="css/admchangepw">
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
				<li class="admindex"><a href="admindex.php" class="xx">管理用户信息</a></li>
				<li class="st"><a href="admst.php" class="xx">查看师生信息</a></li>
				<li class="stuxz"><a href="admc.php" class="xx">查看所有课程</a></li>			
				<li class="search"><a href="admsc.php" class="xx">查看选课信息</a></li>
				<li class="addc"><a href="addc.php" class="xx">添加课程</a></li>
				<li class="changepw"><a href="admchangepw.php" class="xx">修改密码</a></li>
			</ul>
		</div>
	</div>
	<div class="right">
		<?php
			session_cache_limiter('nocache');
			session_start();
			
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎系统管理员".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";
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
		<form name="admchangepw" id="admchangepw" method="post">
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
			<input type="submit" name="submit" value="确认修改" class="sb">		
		</form>
	</div>
</body>
</html>