<?php 
session_start();

require_once('20181030/util/globalSettings.php');
require_once('20181030/services/shelfService.php');

header('content-type:application/json;charset=utf-8');
// 获取bookID

if(!array_key_exists('ids' , $_GET)){
	$result = [
		'code' => 101,
		'message' => '参数无效',
		'data' => -1
	];
	echo json_encode($result);
	exit;
}
$ids = $_GET['ids'];
$list = explode(',' , $ids);



// 获取读者ID
if(!array_key_exists(SESSION_KEY_CURRENT_USER , $_SESSION)){
	$result = [
		'code' => 102,
		'message' => '用户没有登录',
		'data' => -1
	];
	echo json_encode($result);
	exit;
}

$memberId = $_SESSION[SESSION_KEY_CURRENT_USER]['id'];
// print_r($memberId);
// echo $memberId;


//	移除选中
$val = 0;
foreach ($list as  $value) {
	$val = $val + deleteBook($value , $memberId);
}


if($val){
	$result = [
		'code' => 100,
		'message' => 'success',
		'data' => 1
	];
}
else{
	$result = [
		'code' => 110,
		'message' => 'failure',
		'data' => 0
	];
}
echo json_encode($result);


