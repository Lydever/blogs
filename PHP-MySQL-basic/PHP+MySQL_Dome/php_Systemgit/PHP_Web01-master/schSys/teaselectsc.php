<!DOCTYPE html>
<html>
<head>
	<title>老师查看班级学生</title>
	<link rel="stylesheet" type="text/css" href="css/teaselectsc">
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
			
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}
			//获取老师所授课程
			$username=$_SESSION['username'];
			$result=mysqli_query($link,"select class from t where username=$username");
			$data=mysqli_fetch_row($result);
			$class=$data[0];
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."您所授的课程为".'“'.$class.'”'."<br>"."<br>";

			$result1=mysqli_query($link,"select sc.sno,name,sex,tel from sc inner join s on sc.sno=s.sno inner join c on sc.cno=c.cno where cname='$class'");
			echo "<h2 align='center'>本班学生</h2>";	
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>学号</th><th>姓名</th><th>性别</th><th>联系方式</th><th>班级名</th></tr>";
			while($row=mysqli_fetch_array($result1)){
				echo "<tr>";
				echo "<td>".$row[0]."</td>";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[3]."</td>";
				echo "<td>".$class."班"."</td>";
				echo "</tr>";
			}
			echo "</table>";
			mysqli_close($link);
		 ?>
	</div>
</body>
</html>