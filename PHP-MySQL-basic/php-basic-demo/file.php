<?php 
    if ($_SERVER['REQUEST_METHOD']==='POST') {
    	
    }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件域</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELE'];?>" method="post" enctype="multipart">
		<input type="file" name="img">
		<button>提交</button>
	</form>
</body>
</html>