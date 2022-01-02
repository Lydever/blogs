 <?php 
		session_start();
		$link=mysqli_connect('localhost','root','root','schsys','3306');
		mysqli_set_charset($link,'utf8');
		if (!$link){
    		echo"<script>alert('数据库连接失败！')</script>";
		}else{
			if(isset($_POST['submit']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$role=$_POST['role'];

				if($username==""){
					echo"<script>alert('请输入账号！');window.history.go(-1)</script>";
					exit();
				}else if($password==""){
					echo"<script>alert('请输入密码！');window.history.go(-1)</script>";
					exit();
				}

				$result=mysqli_query($link,"select * from user where username='$username' and password='$password' and role='$role'");
				if(mysqli_num_rows($result)==1)
				{
					if($role=="学生"){
						$_SESSION['username']=$username;
						header("Location:stuindex.php");
					}else if($role=="老师")
					{
						$_SESSION['username']=$username;
						header("Location:teaindex.php");
					}else if($role=="系统管理员")
					{
						$_SESSION['username']=$username;
						header("Location:admindex.php");
					}
				}
				else{
					echo"<script>alert('用户名或密码或角色错误，请重新输入！');window.history.go(-1)</script>";				
				}
			}
		}
		mysqli_close($link);
	 ?>