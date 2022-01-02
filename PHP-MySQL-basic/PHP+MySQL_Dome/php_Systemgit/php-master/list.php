<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>list</title>
	<link rel="stylesheet" type="text/css" href="css/list.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="lib/dialog/szjDialog.css">
</head>
<body>
	

	 <div class="container">
	 	<?php 
			require_once('20181030/icn/header.php');
			require_once('20181030/services/listService.php');
			require_once('20181030/util/globalSettings.php');


			// 获取分类
			$cate = getCategory();
			// print_r($cate);

			// 获取出版社
			$pub = getPublish();
			// print_r($pub);

			// 分页
			$pageIndex = 1;
			$pageSize = 10;
			if(array_key_exists('page' , $_GET)){
				$pageIndex = $_GET['page'];
			}

			

			// 筛选
			$categoryId = null;
			$publishId = null;

			if(array_key_exists('cate',$_GET)) {
				$categoryId = $_GET['cate'];
			}
			// print_r($categoryId);
			// echo "<hr>";
			// echo $categoryId;
			// echo "<hr>";

			if(array_key_exists('pub', $_GET)) {
				$publishId = $_GET['pub'];
			}
			// print_r($publishId);
			// echo "<hr>";

			// 获取图书
			$book = getBooks($categoryId,$publishId,$pageIndex);
			// print_r($book);

			$rowCount = getStudentCount($categoryId,$publishId);
			$totalPageCount = ceil($rowCount / $pageSize);

		 ?>
		 <div class="main">

			<div class="nav clear_fix"> 
				<div><span>首页</span>&gt;商城 </div>
				<div onclick="history.back();">返回上一页</div>
			</div>

			<div class="cat clear_fix"> 
				<div>所有分类&gt; </div>
				<div>收起筛选</div>
			</div>

			<div class="navCat">
			
				<ul>
					<li>分类：</li>
					<li class="<?php echo $categoryId == '' ? 'actived' : '' ?>" onclick="location.href = 'list.php?cate&pub=<?php echo $publishId ?>'">全部</li>
					
					<?php foreach ($cate as $i => $value):?>
						<li class="<?php echo $categoryId == $value[0]? 'actived' : '' ?>"  onclick="location.href = 'list.php?cate=<?php echo $value[0] ?>&pub=<?php echo $publishId ?>'"><?php echo $cate[$i]['Name'] ?></li>
					<?php endforeach ?>
				</ul>
			</div>

			<div class="navCat">
				<ul>
					<li>出版社：</li>
					<li class="<?php echo $publishId == '' ? 'actived' : '' ?>" onclick="location.href = 'list.php?pub&cate=<?php echo $categoryId ?>'">全部</li>
					<?php foreach ($pub as $i => $value): ?>
						<li class="<?php echo $publishId == $value[0] ? 'actived' : '' ?>" onclick="location.href = 'list.php?pub=<?php echo $value[0] ?>&cate=<?php echo $categoryId ?>'"><?php echo $pub[$i]['Name'] ?></li>
					<?php endforeach ?>
				</ul>
			</div>

			<div class="all">
				所有商品
			</div>


			<?php if(count($book) > 0 ){
				?>
				<div class="recommend clear_fix">
						<?php foreach ($book as $i=> $value): ?>
							<div>
					 			<div><?php echo $book[$i]['name'] ?></div>
					 			<div>
					 				<img src="Images/<?php echo $book[$i]['image'] ?>" onclick="location.href='detail.php?id=<?php echo $book[$i]['id'] ?>'">
					 			</div>

					 			<div data-book-id="<?php echo $value['id']; ?>">加入借书架<label>可借:<?php echo $book[$i][15] ?>/<?php echo $book[$i][14] ?></label> </div>
					 		</div>
				 		<?php endforeach ?>
		 		
		 			</div>
				<?php }else{ ?>

					<div class="notBook">
					 	此类图书不存在
					 	<div>
					 		<img src="image/111.jpg" width="1080px" height="720px">
					 	</div>
					 </div>
					
			<?php } ?>


		 <div class="page">
		 		<ul id="page">
				<?php for($i = 0 ; $i < $totalPageCount; $i++){ ?>
					<li class="<?php echo $pageIndex==($i + 1) ? 'active' : '' ?>" onclick="location.href='list.php?page=<?php echo $i + 1; ?>'"><?php echo $i + 1; ?></li>
				<?php } ?>

			</ul>
		 	</div>
	 </div>

	  <?php 
			require_once('20181030/icn/footer.php');
		 ?>

	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/dialog/szjDialog.js"></script>
	<script src="js/addShelf.js"></script>
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