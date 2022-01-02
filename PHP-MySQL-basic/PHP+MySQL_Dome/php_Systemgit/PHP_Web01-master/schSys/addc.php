<!DOCTYPE html>
<html>
<head>
	<title>添加课程</title>
	<link rel="stylesheet" type="text/css" href="css/addc">
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
			
			if(isset($_POST['add'])){
				$cno=$_POST['cno'];
				$cname=$_POST['cname'];
				$credit=$_POST['credit'];
				$cmajor=$_POST['cmajor'];
				$tno=$_POST['tno'];

				$result=mysqli_query($link,"select * from c where cno='$cno'");
				$result1=mysqli_query($link,"select * from c where cname='$cname'");
				$result2=mysqli_query($link,"select * from t where tno='$tno'");
				$result3=mysqli_query($link,"select * from t where tno='$tno' and class is NULL and cno is NULL ");
				if(mysqli_num_rows($result)!=1)
				{
					if(mysqli_num_rows($result1)!=1)
					{
						if(mysqli_num_rows($result2)==1)
						{
							if(mysqli_num_rows($result3)==1)
							{
								mysqli_query($link,"insert into c values('$cno','$cname','$credit','$cmajor')");
								mysqli_query($link,"update t set class='$cname' where tno='$tno'");
								mysqli_query($link,"update t set cno='$cno' where tno='$tno'");
								echo "<script>alert('添加成功！')</script>";
							}
							else
							{
								echo "<script>alert('该教师已排课！')</script>";
							}
						}
						else
						{
							echo "<script>alert('该教师不存在！')</script>";
						}
					}
					else
					{
						echo "<script>alert('该课程名已存在！')</script>";
					}
				}				
				else
				{
					echo "<script>alert('该课程号已存在！')</script>";
				}
			}			
			mysqli_close($link);
		?>
		<form name="addc" id="addc" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>输入课程号：</td>
					<td>
		 				<input type="text" name="cno" id="cno" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>输入课程名：</td>
					<td>
		 				<input type="text" name="cname" id="cname" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>输入课程学分：</td>
					<td>
		 				<input type="text" name="credit" id="credit" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>输入课程所属专业：</td>
					<td>
		 				<input type="text" name="cmajor" id="cmajor" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>		 			
		 		</tr>
		 		<tr>
					<td>输入任课老师工号：</td>
					<td>
		 				<input type="text" name="tno" id="tno" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>		 			
		 		</tr>		 		
		 	</table>
		 	<input type="submit" name="add" value="添加课程" class="sb">
		 </form>
	</div>
</body>
</html>