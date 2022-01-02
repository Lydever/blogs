<?php 

function getBookDetail($bookId){
	$sql = "select b.id , b.number , b.state ,b.libraryId , l.name , b.bookId 
from bookDetails b inner join libraries l on l.id=b.libraryId where b.bookId='{$bookId}'";

	
	$details = [];
	$rs = executeQuery($sql);
	if($rs){
		foreach ($rs as $value) {
			$details[] = [
				'id' => $value[0],
				'number' => $value[1]
			];
		}
		
	}
	return $details;
}