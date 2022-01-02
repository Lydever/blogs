<?php 
session_start();
require_once('20181030/util/globalSettings.php');
require_once('20181030/services/shelfService.php');
require_once('20181030/util/alert.php');
//  获取ID


if(!array_key_exists('Id', $_GET)){
	showMessage('参数无效');
	exit;
}

$id = $_GET['Id'];
echo $id;
$memberId = $_SESSION[SESSION_KEY_CURRENT_USER]['id'];
$rowNum = deleteBook($id,$memberId);
echo $rowNum;


if ($rowNum == 0) {
	# code...
	 showMessage('删除失败');
}
else{
	showMessage('删除成功');
	// header('location:shelf.php');
}


