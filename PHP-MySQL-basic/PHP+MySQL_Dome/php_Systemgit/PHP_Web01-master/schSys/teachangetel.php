<!DOCTYPE html>
<html>
<head>
	<title>老师修改联系方式</title>
	<link rel="stylesheet" type="text/css" href="css/teachangetel">
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
			session_cache_limiter('nocache');
			session_start();
			
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}
			if(isset($_POST['submit'])){
				$tel=$_POST['newtel'];
				if($tel==""){
					echo"<script>alert('请输入联系方式！');window.history.go(-1)</script>";
					exit();
				}
				$result=mysqli_query($link,"update t set tel=$tel where username=$username");

				if($result==1){
					echo"<script>alert('修改成功！');window.history.go(-1)</script>";
				}
			}
			mysqli_close($link);			
		 ?>
		<form name="teaxgtel" id="teaxgtel" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>请输入修改后的联系方式：</td>
					<td><input type="text" name="newtel" size="20"></td>
					<td><input type="submit" name="submit" value="修改" class="sb"></td>
				</tr>
			</table>			
		</form>	
	</div>
</body>
</html>