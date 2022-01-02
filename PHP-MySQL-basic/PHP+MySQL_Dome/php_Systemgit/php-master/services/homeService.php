<?php 
require_once('dbHelper.php');

// 轮播
function getAd(){
	$sql = 'select Id , Image , Link , Priority from adverts order by priority desc;';
	$array = executeQuery($sql);
	return $array;	
}
// 获取馆长推荐
function getGZ(){
	$sql = 'select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookinsections bs on b.Id = bs.BookId
where bs.SectionId = "65dcc36c-f4dc-11e7-9d97-14dda9555c37"';
	$array = executeQuery($sql);
	return $array;	
}


// 获取新书推荐
function getnew(){
	$sql = 'select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookinsections bs on b.Id = bs.BookId
where bs.SectionId = "65f0cd39-f4dc-11e7-9d97-14dda9555c37"';
	$array = executeQuery($sql);
	return $array;	
}

// 图书排行
function getRank(){
	$sql = 'select b.id ,b.isbn, b.name ,b.pinyin ,  b.publishDate, b.image, b.introduce , b.state ,b.categoryId,c.name,b.publisherId, p.name , b.authorId , a.name  , b.Amount , (select count(1) from bookdetails where State = 1 and BookId = b.id) 
from books b inner join categories c on b.CategoryId = c.Id inner join publishers p on b.PublisherId = p.Id inner join `authors` a on a.Id = b.AuthorId inner join bookinsections bs on b.Id = bs.BookId
where bs.SectionId = "58f4bfc4-f69f-11e7-a2d5-14dda9555c37"';
	$array = executeQuery($sql);
	return $array;	
}
// 获取所有出版社
function getPublish(){
	$sql = 'select Id,Name from Publishers;';
	$array = executeQuery($sql);
	return $array;	
}

