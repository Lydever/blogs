<?php 
require_once('dbHelper.php');

// 获取图书------带参数查询图书
function getBooks($categoryId,$publishId ,$pageIndex = 1 , $pageSize = 10){
	$startIndex = ($pageIndex - 1) * $pageSize;
	$sq = 'select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
		from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId';
	
	$sql  =$sq . ' limit '.$startIndex.','.$pageSize;
	
	if ($categoryId) {
		$sql =$sq . ' where b.CategoryId = "'.$categoryId.'" limit '.$startIndex.','.$pageSize;
	}
	if ($publishId) {
		$sql  =$sq . ' where b.PublisherId = "'.$publishId.'" limit '.$startIndex.','.$pageSize;
	}
	
	if ($categoryId && $publishId ) {
		$sql  =$sq . ' where b.CategoryId = "'.$categoryId.'" and b.PublisherId = "'.$publishId.'" limit '.$startIndex.','.$pageSize;
	}
	$array = executeQuery($sql);
	return $array;	
}


// 分页
function getStudentCount($categoryId,$publishId){
	$sql = "select count(*) from books";
	if ($categoryId) {
		$sql = 'select count(*) from books where categoryId ="'.$categoryId.'"';


	}
	if ($publishId) {
		if ($categoryId) {
			$sql = 'select count(*) from books where categoryId="'.$categoryId.'"and publisherId="'.$publishId.'"';
		}
		else{
			$sql = 'select count(*) from books where publisherId="'.$publishId.'"';
		}
	}
	// print_r($sql);
	// echo "<hr>";
	$rs = executeQuery($sql);
	if(is_bool($rs)){
		return false;
	}
	return $rs[0][0];
	
}


// 获取所有分类
function getCategory(){
	$sql = 'select Id ,Name ,Icon , Tag from Categories';
	$array = executeQuery($sql);
	return $array;	
}

// 获取所有出版社
function getPublish(){
	$sql = 'select Id,Name from Publishers;';
	$array = executeQuery($sql);
	return $array;	
}


// 详情
function getBookId($bookId){
	$sql = 'select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , a.introduce,(select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId
where b.Id = '." '$bookId ' ";


	$array = executeQuery($sql);
	return $array;
	
}

