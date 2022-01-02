<!DOCTYPE html>
<html>
<head>
	<title>学生退选课程</title>
	<link rel="stylesheet" type="text/css" href="css/outcourse">
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
			session_cache_limiter('nocache');//清空表单
			session_start();
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎用户".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";

			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}

			$result2=mysqli_query($link,"select sno from s where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];

			$result1=mysqli_query($link,"select sc.cno,cname,name,cgrade from sc inner join t on sc.cno=t.cno inner join c on sc.cno=c.cno where sno=$sno");
			
			echo "<h2 align='center'>已选课程</h2>";	
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>课程号</th><th>课程名</th><th>授课老师</th><th>成绩</th></tr>";
			while($row=mysqli_fetch_array($result1)){			
				echo "<tr>";				
            		for($i=0;$i<4;$i++)
					{
            			echo "<td>".$row[$i]."</td>";
        			}
				echo "</tr>";			
			}
			echo "</table>";

			if(isset($_POST['xz'])){
			$tx=$_POST['tx'];//课程号
			//获取学号、专业
			$result2=mysqli_query($link,"select sno,major from s where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];
			$cmajor=$data[1];
			
			$result3=mysqli_query($link,"select * from sc where cno='$tx' and sno='$sno' ");		
			$result4=mysqli_query($link,"select * from sc where sno='$sno' and cno='$tx' and cgrade=0");
			

			if(mysqli_num_rows($result3)==1)
			{
				if(mysqli_num_rows($result4)==1)
				{
					$result5=mysqli_query($link,"delete from sc where sno='$sno' and cno='$tx'");
					echo "<script>alert('退选成功！');window.history.go(-1)</script>";
				}
				else
				{
					echo "<script>alert('您选择的课程已结课！')</script>";
				}
			}
			else
			{
				echo"<script>alert('请输入正确的课程号！')</script>";
			}
		}
		mysqli_close($link);
	?>
		<form name="stutx" id="stutx" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>退选课程的课程号：</td>
					<td>
		 				<input type="text" name="tx" id="tx" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="xz" value="退选课程" class="sb"></td>
		 		</tr>		 		
		 	</table>
		 </form>				
	</div>
</body>
</html>