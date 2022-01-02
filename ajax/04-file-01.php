<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
<form action="04-file-01.php" mothod="post" enctype="multipart/form-data">
	<label >选择您要上传的照片:</label>
	<input type="file" name="avatar">
	<input type="submit" value="上传">
</form>
<?php
function upload(){
   if(!isset($_FILES['avatar'])){
   	$$GLOBALS['message'] = '请上传文件';
   	reurn;
   }

   $avatar = $_FILES['avatar'];
   echo $avatar['error'];
   if($avatar['error']!==UPLOAD_ERR_OK){
   	$GLOBALS['message']='上传失败!';
   	return;
   }

   $source = $avatar['tmp_name'];
   $target = './uploads/'.$avatar['name'];
   $moved = move_uploaded_file($source,$target);
   if(!$moved){
   	$GABALS['meassge']='上传失败';
   	return;
   }
}


   if ($_SERVER['REQUST_METHOD']==='POST') {
   	upload();
   }




// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// $allowimg=array('jpg','jpeg','png');
// $allowsize=150*1024;
// $name=$_FILES['fileimg']['name'];
// $doctype=array_pop(explode('.'),$name);
// $size=$_FILES['fileimg']['size'];       //获取文件信息
// $type=$_FILES['fileimg']['type'];
// $tmp_name=$_FILES['fileimg']['tmp_name']; //获取上传文件的临时存放路径

// $target='uploads/'.$newfname['name'];  //放到目标路径
// $res = move_uploaded_file($tmp_name, $target);
// if ($size<$allowsize) {
// 	if (in_array($doctype,$allowimg)) {
// 		if ($res) {
// 			echo '文件上传成功!';
// 		}
// 	}else{
// 		echo '请检查文件类型,只允许上传jpg格式,jpeg格式或者png格式的图片';
// 	}
// }else{
// 		echo '请检查文件类型,只允许上传最大为150kb的图片';
// }
// }


?>
</body>
</html>