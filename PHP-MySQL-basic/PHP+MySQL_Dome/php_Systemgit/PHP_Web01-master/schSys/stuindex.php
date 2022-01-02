<!DOCTYPE html>
<html>
<head>
	<title>学生个人信息</title>
	<link rel="stylesheet" type="text/css" href="css/stuindex">
</head>
<body>
	<header>
		<div class="p1">江西师范大学教务在线			
		<input type="button" name="zhuxiao" id="zhuxiao" value="注销" onclick="location.href='logout.php' ">
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
			session_start();
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}
			$result=mysqli_query($link,"select * from s where username='$username'");
			echo "<h2 align='center'>学生个人信息表</h2>";
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			while($row=mysqli_fetch_array($result)){					
					echo "<tr><th>学号</th><th>".$row[1]."</th></tr>";
					echo "<tr><th>账号</th><th>".$row[0]."</th></tr>";
					echo "<tr><th>姓名</th><th>".$row[2]."</th></tr>";
					echo "<tr><th>性别</th><th>".$row[3]."</th></tr>";
					echo "<tr><th>年龄</th><th>".$row[4]."</th></tr>";
					echo "<tr><th>联系方式</th><th>".$row[5]."</th></tr>";
					echo "<tr><th>院系</th><th>".$row[6]."</th></tr>";
					echo "<tr><th>专业</th><th>".$row[7]."</th></tr>";
					echo "<tr><th>总学分</th><th>".$row[8]."</th></tr>";			
			}                                                              
			echo "</table>";

			mysqli_close($link);
		 ?>
	</div>
</body>
</html>