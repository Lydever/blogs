<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<?php 
		session_start();

		require_once('20181030/services/loginService.php');
		require_once('20181030/util/globalSettings.php');

		$msg = null;

		// if($_SESSION[SESSION_KEY_CURRENT_USER] != '') {
		// 	header('location:index.php');
		// }

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$phone = $_POST['phone'];
			$password = $_POST['password'];

			$member = login($phone , $password);

			if(null == $member){
				$msg = '用户信息不正确';
			}
			else{
				// ?
				if(array_key_exists(SESSION_KEY_REFERER_URL , $_SERVER)){
					$referer = $_SESSION[SESSION_KEY_REFERER_URL];
				}
				else{
					$referer = 'index.php';
				}
				
				unset($_SESSION[SESSION_KEY_REFERER_URL]);
				// 保存登录信息
				$_SESSION[SESSION_KEY_CURRENT_USER] = $member;


				header('location:' . $referer);
			}
		}
	 ?>

	<div class="container">
		<div class="smallDiv clear_fix">
			<div>
				<img src="image/books.jpg">
			</div>
			<div class="log">
				<form method="post">
					<div>用户登录</div>
					<div>
						<input type="text" name="phone" placeholder="请输入手机号码"></div>
					<div><input type="password" name="password" placeholder="请输入密码"></div>
					<div>
						<button>登录</button>
					</div>	

					<?php if ($msg): ?>
						<div>
							<?php echo $msg; ?>
						</div>
					<?php endif ?>
				</form>
				
			</div>
		</div>
	</div>
	
</body>
</html>