<?php 
include("Counter.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>访问者计数器-文字版</title>
	<style>
		.container{
			width: 200px;
			margin: 40px auto;
		}
		.container p{
			text-align: center;
		}

	</style>
</head>
<body>
	<div class="container">
	  <h3>访问者计数器-文字版</h3>
	  <p>您是第 <font color="#0870F1"><?php  echo $counter ?></font>个访问者</p>	
	</div>
</body>
</html>