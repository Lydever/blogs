<?php 
require_once('dbHelper.php');
// 获取所有订单

function getOrder($memberId,$pageIndex=1,$pageSize=8,$State){
	$startIndex = ($pageIndex - 1) * $pageSize;
	if($State==1){
		$sql = 'select br.id , br.borrowNumber , br.bookId , b.name , b.Image , br.bookNumber , b.AuthorId , a.`Name` , b.PublisherId , p.`Name` ,br.createTime , br.sendTime , br.ReceiveTime , br.state ,m.Name,m.Phone
from borrowrecords br inner join books b on b.Id = br.BookId inner join `authors` a on b.AuthorId = a.Id inner join publishers p on b.PublisherId = p.Id inner join members m on br.MemberId = m.Id
where br.MemberId ="'.$memberId.'" and br.State= 1 order by br.state asc , br.CreateTime limit '.$startIndex.','.$pageSize;
	}
	else{
$sql = 'select br.id , br.borrowNumber , br.bookId , b.name , b.Image , br.bookNumber , b.AuthorId , a.`Name` , b.PublisherId , p.`Name` ,br.createTime , br.sendTime , br.ReceiveTime , br.state ,m.Name,m.Phone
from borrowrecords br inner join books b on b.Id = br.BookId inner join `authors` a on b.AuthorId = a.Id inner join publishers p on b.PublisherId = p.Id inner join members m on br.MemberId = m.Id
where br.MemberId ="'.$memberId.'" and br.State!= 1 order by br.state asc , br.CreateTime limit '.$startIndex.','.$pageSize;
	}
		
	// echo $sql;
	$array = executeQuery($sql);
	return $array;	
	
}

// 分页
function getStudentCount($memberId,$State){
	// $sql = 'select count(*) from borrowrecords where memberId ="'.$memberId.'" and State ="'.$State.'"';
	if ($State == 1) {
		$sql = 'select count(*) from borrowrecords where memberId ="'.$memberId.'" and State =1';
	}
	else{
		$sql = 'select count(*) from borrowrecords where memberId ="'.$memberId.'" and State !=1';
	}
	// print_r($sql);
	$rs = executeQuery($sql);
	if(is_bool($rs)){
		return false;
	}
	return $rs[0][0];
	
}
function getState($State){
	if ($State == 1) {
		# code...
		return '待配送';
	}
	else{
		return '已配送';
	}
}


function getButtonState($State){
	if ($State == 1) {
		# code...
		return '取消';
	}
	else{
		return '订单已完成';
	}
}

function getButtonClass($State){
	if ($State == 1) {
		return 'btn btn-danger';
	}
	else{
		return 'btn btn-default';
	}
}


// function getState($State){
// 	if ($State == 0) {
// 		return '已取消订单';
// 	}
// 	if ($State == 1) {
// 		# code...
// 		return '待配送';
// 	}
// 	if ($State == 2) {
// 		# code...
// 		return '待归还';
// 	}
// 	if ($State == 3) {
// 		# code...
// 		return '待确定';
// 	}
// 	if ($State == 4) {
// 		# code...
// 		return '已归还';
// 	}
// }


// function getButtonState($State){
// 	if ($State == 0) {
// 		return '已取消订单';
// 	}
// 	if ($State == 1) {
// 		# code...
// 		return '取消';
// 	}
// 	if ($State == 2) {
// 		# code...
// 		return '归还';
// 	}
// 	if ($State == 3) {
// 		# code...
// 		return '确认';
// 	}
// 	if ($State == 4) {
// 		# code...
// 		return '已归还';
// 	}
// }


// 确认收货
