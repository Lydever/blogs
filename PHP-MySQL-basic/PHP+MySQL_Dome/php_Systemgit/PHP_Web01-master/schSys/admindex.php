<!DOCTYPE html>
<html>
<head>
	<title>管理用户信息</title>
	<link rel="stylesheet" type="text/css" href="css/admindex">
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
			session_cache_limiter('nocache');// 清空表单
			session_start();
			
			echo "<br>"."&nbsp;&nbsp;&nbsp;"."  欢迎系统管理员".'“'.$_SESSION['username'].'”'."登录！"."<br>"."<br>";
			$username=$_SESSION['username'];
			$link=mysqli_connect('localhost','root','root','schsys','3306');
			mysqli_set_charset($link,'utf8');
			if (!$link){
    			echo"<script>alert('数据库连接失败！')</script>";
			}

			$result=mysqli_query($link,"select * from user where username!='$username'");
			echo "<h2 align='center'>用户信息表</h2>";
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>用户名</th><th>密码</th><th>角色</th></tr>";
			while($row=mysqli_fetch_array($result)){				
				echo "<tr>";
					for($i=0;$i<3;$i++)
					{
						echo "<td>".$row[$i]."</td>";
					}
				echo "</tr>";			
			}
			echo "</table>";

			
			if(isset($_POST['dele'])){
				$name=$_POST['name'];
				$result1=mysqli_query($link,"select * from user where username='$name'");
				if($name!=$username)
				{
					if(mysqli_num_rows($result1)==1)
					{
						mysqli_query($link,"delete from user where username=$name");
						echo "<script>alert('删除成功！');window.history.back(-1);</script>";

					}
					else
					{
						echo "<script>alert('请输入正确的用户名！')</script>";
					}
				}				
				else
				{
					echo "<script>alert('不能删除系统管理员！')</script>";
				}
			}			
			mysqli_close($link);
		?>
		<form name="admdele" id="admdele" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>输入要删除的用户名：</td>
					<td>
		 				<input type="text" name="name" id="name" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="dele" value="确认删除" class="sb"></td>
		 		</tr>		 		
		 	</table>
		 </form>
	</div>
</body>
</html>