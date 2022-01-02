<?php 
session_start();
require_once('20181030/util/globalSettings.php');
require_once('20181030/services/shelfService.php');
require_once('20181030/util/alert.php');
//  获取ID


$memberId = $_SESSION[SESSION_KEY_CURRENT_USER]['id'];
echo $memberId;
$rowNum = deleteAllBook($memberId);
echo $rowNum;


if ($rowNum == 0) {
	# code...
	 showMessage('删除失败');
}
else{
	showMessage('删除成功');
	// header('location:shelf.php');
}


