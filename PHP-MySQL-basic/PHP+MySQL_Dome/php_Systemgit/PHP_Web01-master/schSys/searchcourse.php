<!DOCTYPE html>
<html>
<head>
	<title>学生课程查询</title>
	<link rel="stylesheet" type="text/css" href="css/searchcourse">
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
	?>
		<form name="stusc" id="stusc" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>查询课程号：</td>
					<td>
		 				<input type="text" name="sc" id="sc" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="search" value="查询课程" class="sb"></td>
		 	</table>
		 </form>
		 <?php 
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}

			//获取课程号
			if(isset($_POST['search']))
			{
				$cno=$_POST['sc'];
				$result1=mysqli_query($link,"select c.cno,cname,name,credit from c inner join t on c.cno=t.cno where c.cno='$cno'");
				$result3=mysqli_query($link,"select * from c where cno='$cno'");
				if(mysqli_num_rows($result3)==1){
				echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
				echo "<tr><th>课程号</th><th>课程名</th><th>授课老师</th><th>可获学分</th></tr>";
				while($row=mysqli_fetch_array($result1)){			
					echo "<tr>";				
	            		for($i=0;$i<4;$i++)
						{
	            			echo "<td>".$row[$i]."</td>";
	        			}
					echo "</tr>";							
				}
				echo "</table>";	
			}				
			else
			{
				echo "<script>alert('查无此课！')</script>";
			}
		}
		mysqli_close($link);
	?>			
	</div>
</body>
</html>