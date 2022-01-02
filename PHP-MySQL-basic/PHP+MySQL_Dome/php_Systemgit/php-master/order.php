<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>order</title>
	<link rel="stylesheet" type="text/css" href="css/order.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="lib/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lib/dialog/szjDialog.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<body>
	

	 <div class="container">
	 	<?php 
			require_once('20181030/icn/header.php');
			require_once('20181030/services/orderService.php');

			$memberId = $_SESSION[SESSION_KEY_CURRENT_USER]['id'];
			if(!array_key_exists(SESSION_KEY_CURRENT_USER , $_SESSION)){
				header('location:login.php');
				exit;
			}
			
			// print_r($getShelf); 

			// 分页
			$pageIndex = 1;
			$pageSize = 8;
			if(array_key_exists('page' , $_GET)){
				$pageIndex = $_GET['page'];
			}


			$State = 1;
			if (array_key_exists('State',$_GET)) {
				# code...
				$State = $_GET['State'];
			}
			// echo $State;
			// 未发送
			$wf = getOrder($memberId,$pageIndex,$pageSize,$State);
			// print_r($wf);

			//分页
			$rowCount = getStudentCount($memberId,$State);
			$totalPageCount = ceil($rowCount / $pageSize);

			
		 ?>
		 <div class="main">

			<div class="nav clear_fix"> 
				<div><span>首页</span>&gt;订单 </div>
				<div onclick="history.back();">返回上一页</div>
			</div>


			<div class="btnOr clear-fix">
				<!-- <a id="no"  class="<?php echo $s?>"  href="order.php?State=1">未发货订单</a><a id="hi"  class="aNoActive" href="order.php?State=5">历史订单</a>
				<div></div> -->

				<a id="no"  class=" <?php echo $State == 1  ? 'aActive' : 'aNoActive' ?>" href="order.php?State=1">未发货订单</a><a id="hi" class=" <?php echo $State == 5 ? 'aActive' : 'aNoActive' ?> " href="order.php?State=5">历史订单</a><div></div>

				
			

			</div>

			<!-- 未发货订单 -->
			<div class="nosend">
				<?php foreach ($wf as $i => $value): ?>
					<div  class=" bookOrder clear-fix" >
					    <div class="bookOrderNumber"><?php echo $i+1 ?></div>
					    <div class="bookOrderImage"><img src="Images/<?php echo $value['Image'] ?>"> </div>
					    <div class="bookOrderMessage">
					        <ul>
					            <li>图书编号:<?php echo $value['bookNumber'] ?></li><br>
					            <li>图书名称:<?php echo $value['name'] ?></li><br>
					            <li>图书作者:<?php echo $value[7] ?></li><br>
					        </ul>
		    			</div>
					    <div class="bookOrderSend">
					      <button class="<?php echo getButtonClass($wf[$i][13]) ?>"><?php echo getButtonState($wf[$i][13]) ?></button>
					    </div>
					    <div class="bookPeople">
					      <ul>
					        <li>借阅人:<?php echo $value[14] ?></li>
					        <li>电话:<?php echo $value[15] ?></li>
					        <li>借阅时间:<?php echo date("Y-m-d H:i:s",($value['createTime'])/1000)  ?></li>
					        <li>状态:<?php echo getState($value[13]) ?></li>
					      </ul>
					    </div>
	 			 	</div>
				<?php endforeach ?>

				<div class="page">

		 		<ul id="page">
				<?php for($i = 0 ; $i < $totalPageCount; $i++){ ?>
					<li class="<?php echo $pageIndex==($i + 1) ? 'actived' : '' ?>" onclick="location.href='order.php?page=<?php echo $i + 1; ?>'"><?php echo $i + 1; ?></li>
				<?php } ?>

				</ul>
				
		 	</div>
				
		</div>
		 </div>


		 <?php 
			require_once('20181030/icn/footer.php');
		 ?>
	 </div>

	 <script type="text/javascript">
	 	window.onload = function(){
	 		var no = document.querySelector('#no');
	 		var hi = document.querySelector('#hi');

	 		no.onclick = function(){
	 			no.className = 'aActive';
	 			hi.className = 'aNoActive';
	 		}

	 		hi.onclick = function(){
	 			no.className = 'aNoActive';
	 			hi.className = 'aActive';
	 		}
	 	}
	 </script>
	
</body>
</html>