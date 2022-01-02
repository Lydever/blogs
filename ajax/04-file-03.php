
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
<form action="04-file-03.php" mothod="post" enctype="multipart/form-data">
	<label >选择您要上传的照片:</label>
	<input type="file" name="upload">
	<input type="submit" value="上传">
</form>
<?php
$filename = $_FILES['upload']['tmp_name'];
$dest = 'uploads/'.$_FILES['upload']['name'];
$res = move_uploaded_file($filename, $dest);
if ($res) {
	echo '文件上传成功';
}else{
	echo '文件上传失败';
}
?>
</body>
</html>