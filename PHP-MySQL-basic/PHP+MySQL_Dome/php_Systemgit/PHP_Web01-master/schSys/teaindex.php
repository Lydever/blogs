<!DOCTYPE html>
<html>
<head>
	<title>老师个人信息</title>
	<link rel="stylesheet" type="text/css" href="css/teaindex">
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
			session_start();
			
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}

			$result=mysqli_query($link,"select * from t where username='$username'");			
			echo "<h2 align='center'>老师个人信息表</h2>";
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			while($row=mysqli_fetch_array($result)){
					$result2=mysqli_query($link,"select credit from c where cno='$row[8]'");
					$data=mysqli_fetch_row($result2);					

					echo "<tr><th>工号</th><th>".$row[1]."</th></tr>";
					echo "<tr><th>账号</th><th>".$row[0]."</th></tr>";
					echo "<tr><th>姓名</th><th>".$row[2]."</th></tr>";
					echo "<tr><th>性别</th><th>".$row[3]."</th></tr>";
					echo "<tr><th>年龄</th><th>".$row[4]."</th></tr>";
					echo "<tr><th>联系方式</th><th>".$row[5]."</th></tr>";
					echo "<tr><th>院系</th><th>".$row[6]."</th></tr>";
					echo "<tr><th>所授课程</th><th>".$row[7]."</th></tr>";
					echo "<tr><th>课程学分</th><th>".$data[0]."</th></tr>";			
			}
			echo "</table>";
			mysqli_close($link);
		?>
	</div>
</body>
</html>