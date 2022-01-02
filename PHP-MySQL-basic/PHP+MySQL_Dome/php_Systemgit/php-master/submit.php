<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		session_start();
		require_once('20181030/util/globalSettings.php');
		require_once('20181030/services/shelfService.php');
		require_once('20181030/util/alert.php');
		// 获取当前memberId
	 	$memberId = $_SESSION[SESSION_KEY_CURRENT_USER]['id'];
		// 根据memberId获取借书架列表
		$list = getShelf($memberId);
		// print_r($list);

		// 判断是否有可借图书
		// temp空数组，用来存放借书架里数的列表
		// 如果数量为0，不可借，原来的值继续保存
	 	$temp = [];
	 	foreach ($list as $value) {
	 		if($value[15] == 0){
	 			$temp[] = $value;
	 		}
	 	}

		// 借阅
		// 如果temp为空，没有库存
		if($temp){
			foreach ($temp as $value) {
				showMessage('没有库存');
				// echo $value['name'] , '没有库存' , '<br />';
			}
			echo "<hr />";			
		}
		else{
			$val = submitOrder($memberId , $list);
			if($val){
				showMessage('提交成功');
			}
			else{
				showMessage('提交失败');
				// echo "提交失败";
			}
		}
	 ?>
</body>
</html>