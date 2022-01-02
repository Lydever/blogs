<?php 

require_once('dbHelper.php');

function login($phone , $password){
	$sql = "select id,name,Phone,CardId,Address,State , Header from members where phone='".$phone."' and password=password('".$password."')";

	$member = null;
	$rs = executeQuery($sql);

	if($rs){
		$member = [
			'id' => $rs[0][0],
			'name' => $rs[0][1],
			'phone' => $rs[0][2]
		];
	}

	return $member;
}