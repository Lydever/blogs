
	<?php 
		session_start();
		require_once('20181030/util/globalSettings.php');
 	?>
	<div class="container">
		<div class="header-menu">
			<?php if(array_key_exists(SESSION_KEY_CURRENT_USER, $_SESSION)){
				?>
				<div class="clear_fix">
					<!-- <div></div>
					<div></div> -->
					<div>欢迎来到图书商城&nbsp;&nbsp;<?php echo $_SESSION[SESSION_KEY_CURRENT_USER]['name']; ?>&nbsp;&nbsp;<a href="destroy.php">注销</a>
					</div>
					<div> 
						<ul>
							<li><a href="order.php">我的订单|</a></li>
							<li><a href="shelf.php">借书架</a></li>
						</ul>
					</div>
				</div>
			
			<?php }else{ ?>
				<div>
					<div>欢迎来到图书商城&nbsp;&nbsp;<a href='login.php'>登录</a></div>
					<div>
						<ul>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</ul>
					</div>
				</div>
				
			<?php } ?>

		</div>
	
		<div class="header-search clear_fix">
			<div>
				<img src="image/lo.jpg">
			</div>
			<div>
				<input type="text" name=""><button><i class="fa fa-search"></i></button>
			</div>
			<div>
				<i class="fa fa-book" aria-hidden="true" ></i>&nbsp;<span onclick="location.href='shelf.php'"> 借书架&nbsp;&nbsp;|&nbsp;&nbsp;</span>
				<i class="fa fa-file" aria-hidden="true" ></i>&nbsp;<span onclick="location.href='order.php'"> 我的订单&nbsp;&nbsp;</span>
			</div>
		</div>

		<?php  
			$page = pathinfo($_SERVER['SCRIPT_FILENAME'],PATHINFO_BASENAME);
			// print_r($page);
		?>

		<div class="header-nav">
			<ul>
				<li class="<?php echo $page == 'index.php' ? 'active' : '' ?>"><a href="index.php">首页</a> </li>
				<li class="<?php echo $page == 'list.php' ? 'active' : '' ?>"><a href="list.php">图书商城</a></li>
				<li class="<?php echo $page == 'intro.php' ? 'active' : '' ?>"><a href="intro.php">品牌简介</a></li>
			</ul>
		</div>
	</div>
	
