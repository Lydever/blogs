<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>list</title>
	<link rel="stylesheet" type="text/css" href="css/detail.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lib/dialog/szjDialog.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>


	 <div class="container">
	 	<?php 
			require_once('20181030/icn/header.php');
			require_once('20181030/services/listService.php');
			require_once('20181030/util/globalSettings.php');
			$id = $_GET['id'];
			// echo $id;
			$array = getBookId($id);
			// print_r($array);
			// echo "<hr>";
		 ?>
		 <div class="main">

			<div class="nav clear_fix"> 
				<div><span>首页</span>&gt;商城&gt;商品详情 </div>
				<div onclick="history.back();">返回上一页</div>
			</div>

			<div class="detail clear_fix">
				<div>
					<img src="Images/<?php echo $array[0][5] ?>">
				</div>
				<div>
					<ul>
						<li><span>书名：</span><?php echo $array[0][2] ?></li>
						<li><span>作者：</span><?php echo $array[0]['name'] ?> </li>
					</ul>

					<ul>
						<li><span>出版社：</span><?php echo $array[0][11] ?></li>
						<li><span>类别：</span><?php echo $array[0][9] ?></li>
					</ul>

					<ul>
						<li><span>出版日期：</span><?php echo $array[0][4] ?></li>
						<li><span>可借/库存:</span> <?php echo $array[0][16] ?>/<?php echo $array[0][14] ?></li>
					</ul>	
				</div>
			</div>

			<div class="shelf">
				<button data-book-id="<?php echo $array[0]['id']; ?>"><i class="fa fa-shopping-cart"></i>加入购物车 </button>&nbsp;&nbsp;
				<button onclick="location.href='shelf.php'"><i class="fa fa-book" ></i>我的借书架</button>
			</div>

			<div class="jj">
				<div><?php echo $array[0][2] ?></div>
				<div><?php echo $array[0][6] ?></div>
			</div>

			<div class="jj">
				<div><?php echo $array[0]['name'] ?></div>
				<div><?php echo $array[0][15] ?></div>
			</div>



		 </div>


		 <?php 
			require_once('20181030/icn/footer.php');
		 ?>
	 </div>

	 <script src="lib/js/jquery.min.js"></script>
	<script src="lib/dialog/szjDialog.js"></script>
	<script src="js/detail.js"></script>
	<script type="text/javascript">
		$(function(e){
	        <?php if(array_key_exists(SESSION_KEY_MESSAGE, $_SESSION)) {?>

	            SZJDialog.alert({
	                message:'<?php echo $_SESSION[SESSION_KEY_MESSAGE]; ?>'
	            });

        	<?php 
        			unset($_SESSION[SESSION_KEY_MESSAGE]);
        		} 
        	?>  

        	 
	    });
	</script>
	
</body>
</html>