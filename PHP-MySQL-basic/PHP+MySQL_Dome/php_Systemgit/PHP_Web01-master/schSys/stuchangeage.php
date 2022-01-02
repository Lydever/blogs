<!DOCTYPE html>
<html>
<head>
	<title>学生修改年龄</title>
	<link rel="stylesheet" type="text/css" href="css/stuchangeage">
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
				<li class="stuxx"><a href="stuindex.php" class="xx">基本信息</a></li>
				<li class="stuxz"><a href="stuxk.php" class="xx">选择课程</a></li>
				<li class="search"><a href="searchcourse.php" class="xx">课程查询</a></li>
				<li class="stuoutc"><a href="outcourse.php" class="xx">退选课程</a></li>
				<li class="stuchange">
					<a href="#" class="xx">修改信息</p>
					<ul>
						<li><a href="stuchangeage.php" class="xx">修改年龄</a></li>
						<li><a href="stuchangetel.php" class="xx">修改联系方式</a></li>
					</ul>
				</li>
				<li class="changepw"><a href="stuchangepw.php" class="xx">修改密码</a></li>
			</ul>
		</div>
	</div>
	<div class="right">
		<?php 
			session_cache_limiter('nocache');//清空表单，只在session生效期间
			session_start();
			
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}
			if(isset($_POST['submit'])){
				$age=$_POST['newage'];
				if($age==""){
					echo"<script>alert('请输入年龄！');window.history.go(-1)</script>";
					exit();
				}
				$result=mysqli_query($link,"update s set age=$age where username=$username");

				if($result==1){
					echo"<script>alert('修改成功！');window.history.go(-1)</script>";
				}
			}
			mysqli_close($link);			
		 ?>
		<form name="stuxgage" id="stuxgage" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>请输入修改后的年龄：</td>
					<td><input type="text" name="newage" size="10"></td>
					<td><input type="submit" name="submit" value="修改" class="sb"></td>
				</tr>
			</table>			
		</form>		
	</div>
</body>
</html>