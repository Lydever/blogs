<?php 
define('DB_HOST', '127.0.0.1');
define('DB_USER','root');
define('DB_PASSWORD','niit');
define('DB_DBNAME','20181030');

/**
 * 执行DML语句-------------增，删，改-------------------
 * @param  [string] $sql [insert update delete]
 * @return [integer]      [影响行数]
 */
function executeNonQuery($sql){
	$con = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DBNAME);
	if (!$con) {
		# code...
		return false;
	}

	$result = mysqli_query($con,$sql);
	$rowNum = false;
	if ($result) {
		# code...
		// 行数变化情况
		// mysql_affected_rows(link_identifier)link_identifier必需。MySQL 的连接标识符。如果没有指定，默认使用最后被 mysql_connect() 打开的连接。如果没有找到该连接，函数会尝试调用 mysql_connect() 建立连接并使用它。如果发生意外，没有找到连接或无法建立连接，系统发出 E_WARNING 级别的警告信息。
		$rowNum = mysqli_affected_rows($con);
	}
	mysqli_close($con);
	return $rowNum;

}



/**
 * 执行DQL--------------查/获取图书列表-----------------------------
 * @param  [string] $sql [select]
 * @return [array]      [结果集]
 */
 function executeQuery($sql){
 	$con = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DBNAME);
	if (!$con) {
		# code...
		return false;
	}
	$result = mysqli_query($con,$sql);

	$array = false;

	if ($result) {
		$array = mysqli_fetch_all($result,MYSQL_BOTH);
		mysqli_free_result($result);
	}
	mysqli_close($con);

	return $array;
 }
