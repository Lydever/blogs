<?php 

require_once('dbHelper.php');
require_once('bookService.php');

// 加入借书架
function addShelf($bookId , $memberId){
	$id = md5(uniqid(microtime() . mt_rand()));
	$createTime = time();
 	$sql = "insert into bookshelves(id, memberId , bookId , createTime) values('".$id."' , '".$memberId."' , '".$bookId."', '".$createTime."');";
 	// print_r($sql);

	return executeNonQuery($sql) > 0;
}

// 获取借书架
function getShelf($memberId,$pageIndex = 1 , $pageSize = 6){
	$startIndex = ($pageIndex - 1) * $pageSize;
	$sql = 'select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id), bs.id
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookshelves bs on bs.BookId = b.Id 
where memberId = "'.$memberId.'" limit '.$startIndex.','.$pageSize;

	$rs = executeQuery($sql);
	return $rs;	
}

// 分页
function getStudentCount($memberId){
	$sql = 'select count(*) from bookshelves where memberId ="'.$memberId.'"';
	// print_r($sql);
	$rs = executeQuery($sql);
	if(is_bool($rs)){
		return false;
	}
	return $rs[0][0];
	
}

// 提交
function submitOrder($memberId , $list){
	$records = [];
	// 获取具体图书(BookNumber)
	foreach ($list as $value) {
		$records[] = [
			"id" => md5(uniqid(microtime() . mt_rand())),
			"borrowNumber" => date('YmdHis') . '-' . mt_rand(100000 , 999999),
			'bookId' => $value['id'],
			'bookNumber' => getBookDetail($value['id'])[0]['number'],
			'memberId' => $memberId
		];
	}

	
	// 生成借阅记录
	$val = 0;
	foreach ($records as $value) {
		$sql = "insert into borrowrecords(id , borrowNumber , bookId , bookNumber , memberId  , createTime, state) values('" . $value['id'] . "' , '" . $value['borrowNumber'] . "' , '" . $value['bookId'] . "' , '" . $value['bookNumber'] . "' , '" . $value['memberId'] . "' , " . time() . " , 1)";

		$val = $val + executeNonQuery($sql);
	}

	// echo '添加行数:' , $val;
	// echo "<hr />";

	$val = 0;
	// 更新图书状态
	foreach ($records as $value) {
		$sql = "update bookDetails set state = 0 where number = '" . $value['bookNumber'] . "'";

		$val = $val + executeNonQuery($sql);
	}
	// 清除借书架
	echo '更新行数:' , $val;
	$sql = "delete from bookshelves where memberid = '${memberId}'";
	$val = executeNonQuery($sql);
	return true;
}



// 移除借书架
function deleteBook($id,$memberId){
	$sql = 'delete from bookshelves where memberId="'.$memberId.'" and bookId="'.$id.'"';
	// print_r($sql);
	$rowNum = executeNonQuery($sql);
	return $rowNum;
}


// 移除全部借书架
// function deleteAllBook($memberId){
// 	$sql = 'delete from bookshelves where memberId="'.$memberId.'"';
// 	$rowNum = executeNonQuery($sql);
// 	return $rowNum;

// }