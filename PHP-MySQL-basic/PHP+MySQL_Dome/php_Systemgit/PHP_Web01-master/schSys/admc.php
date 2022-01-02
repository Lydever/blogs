<!DOCTYPE html>
<html>
<head>
	<title>查看所有课程</title>
	<link rel="stylesheet" type="text/css" href="css/admc">
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
			session_start();
			
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎系统管理员".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}

			$result=mysqli_query($link,"select c.cno,cname,credit,name from c inner join t on c.cno=t.cno");
			echo "<h2 align='center'>课程信息表</h2>";
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>课程号</th><th>课程名</th><th>可获学分</th><th>任课老师</th></tr>";
			while($row=mysqli_fetch_array($result)){				
				echo "<tr>";
					for($i=0;$i<4;$i++)
					{
						echo "<td>".$row[$i]."</td>";
					}
				echo "</tr>";			
			}
			echo "</table>";

			mysqli_close($link);
		?>
	</div>
</body>
</html>