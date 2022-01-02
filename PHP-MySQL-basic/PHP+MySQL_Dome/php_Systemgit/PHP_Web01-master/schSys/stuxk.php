<!DOCTYPE html>
<html>
<head>
	<title>学生选课</title>
	<link rel="stylesheet" type="text/css" href="css/stuxk">
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
			session_start();
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";

			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}
			$result1=mysqli_query($link,"select c.cno,cname,t.name,credit,cmajor from c inner join t on c.cno=t.cno inner join s where s.username=$username and cmajor=major");
			echo "<h2 align='center'>可选课程</h2>";	
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>课程号</th><th>课程名</th><th>授课老师</th><th>可获学分</th><th>所属专业</th></tr>";
			while($row=mysqli_fetch_array($result1)){
				echo "<tr>";
				for($i=0;$i<5;$i++)
				{
            		echo "<td>".$row[$i]."</td>";
        		}
				echo "</tr>";
			}
			echo "</table>";

			if(isset($_POST['xz'])){
			$xk=$_POST['xk'];//课程号
			//获取学号、专业
			$result2=mysqli_query($link,"select sno,major from s where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];
			$cmajor=$data[1];		
			
			$result3=mysqli_query($link,"select * from c where cno=$xk and cmajor='$cmajor'");		
			$result4=mysqli_query($link,"select * from sc where sno='$sno' and cno='$xk'");
			

			if(mysqli_num_rows($result3)==1)
			{
				if(mysqli_num_rows($result4)!=1)
				{
					mysqli_query($link,"insert into sc values ('$sno','$xk','0')");
					echo "<script>alert('选课成功！')</script>";
				}
				else
				{
					echo "<script>alert('您已经选择该课！')</script>";
				}			
			}
			else
			{
				echo"<script>alert('请输入正确的课程号！')</script>";
			}
		}
		mysqli_close($link);
	?>
		 <form name="stuxk" id="stuxk" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>选择课程的课程号：</td>
					<td>
		 				<input type="text" name="xk" id="xk" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="xz" value="选择课程" class="sb"></td>
		 		</tr>
		 	</table>
		 </form>			
	</div>
</body>
</html>