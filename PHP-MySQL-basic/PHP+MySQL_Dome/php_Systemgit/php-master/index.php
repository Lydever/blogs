<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	</style>
</head>
<body>
	

	 <div class="container">
	 	<?php 
			require_once('20181030/icn/header.php');
			require_once('20181030/services/homeService.php');

			$ad = getAd();
			// print_r($ad);

			$gz = getGZ();
			$gztj = array_pop($gz);
			// print_r($gztj);

			$new = getnew();
			$xstj = array_pop($new);

			$rank = getRank();
			$ph = array_pop($rank);

			// print_r($gz);
		 ?>
		 <div class="main">

		 	<div id="ad">
		 		<!-- 数据库获取广告 -->
		 		<!-- <?php foreach ($ad as $i => $value): ?>
		 			<img src="Images/<?php echo $ad[$i]['Image'] ?>">	
		 		<?php endforeach ?> -->

		 		<img src="image/ad7.jpg" alt="ad6.jpg">
		 		<img src="image/ad3.jpg" alt="ad7.jpg">
		 		<img src="image/ad4.jpg" alt="ad9.jpg">
		 		<img src="image/ad5.jpg" alt="ad10.jpg">
		 		

		 		<ul id="circle">
					<li class="active"></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<div id="arrow-left" class="arrow">
					<img src="image/left.png">
				</div>
				<div id="arrow-right" class="arrow">
					<img src="image/right.png">
				</div>

		 	</div>

		 	<!-- /////////////////////馆长推荐////////////////////// -->
		 	<div class="bt">
		 		<div class="x"></div>
		 		<div class="mz">馆长推荐</div>
		 	</div>

		 	<div class="recommend clear_fix">
		 		<?php foreach ($gz as $i => $value): ?>		 		
			 		<div>
			 			<div><?php echo $gz[$i]['2'] ?></div>
			 			<div></div>
			 			<div><?php echo $gz[$i]['name'] ?></div>
			 			<div>
			 				<img src="Images/<?php echo $gz[$i]['image'] ?>" onclick="location.href='detail.php?id=<?php echo $gz[$i]['id'] ?>'">
			 			</div>
			 		</div>
			 	<?php endforeach ?>

		 	</div>

			<!-- /////////////////////新书推荐////////////////////// -->
		 	<div class="bt">
		 		<div class="x"></div>
		 		<div class="mz">新书推荐</div>
		 	</div>

		 	<div class="recommend clear_fix newBook">
		 		<?php foreach ($new as $i => $value): ?>
		 			<div>
			 			<div>
			 				<img src="Images/<?php echo $new[$i]['image'] ?>" onclick="location.href='detail.php?id=<?php echo $new[$i]['id'] ?>'">
			 			</div>
			 			<div><?php echo $new[$i]['2'] ?></div>
			 		</div>
		 		<?php endforeach ?>	
		 	</div>

		 	<!-- //////////////////////图书排行///////////////////// -->
		 	<div class="bt">
		 		<div class="x"></div>
		 		<div class="mz">图书排行</div>
		 	</div>

		 	<div class="recommend clear_fix list">
		 		<?php foreach ($rank as $i => $value): ?>
		 			<div>
			 			<div>
			 				<img src="Images/<?php echo $rank[$i]['image'] ?>" onclick="location.href='detail.php?id=<?php echo $rank[$i]['id'] ?>'">
			 			</div>
			 			<div><?php echo $rank[$i]['2'] ?></div>
			 		</div>
		 		<?php endforeach ?>
		 		

		 		
		 		
		 	</div>

		 </div>

		<?php 
			require_once('20181030/icn/footer.php');
		 ?>
		
	 </div>
	<script type="text/javascript" src="js/ad.js"></script>
</body>
</html>