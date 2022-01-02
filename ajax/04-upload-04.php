<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
	<h3>文件上传:</h3>	
	<form action="04-upload-04.php" method='post' enctype='multipart/form-data'>
	    <label >选择您要上传的照片:</label>
	    <input type="file" name="img">
	    <input type="submit" value="上传">
    </form>
<?php
$allow=array('gif','png','jpeg');  // 定义一个数组只允许上传的gif,png或者jpeg图片文件数组
$allowsize=150*1024;         //只允许上传150KB以内的图片

$name=$_FILES['img']['name'];
$doctype=@array_pop(explode('.',$name));  // 字符串处理 分割文件名获取文件类型
$size=$_FILES['img']['size'];
$tmp_name=$_FILES['img']['tmp_name'];  // 获取文件

$target='uploads/'.$doctype;     // 存放位置
if($size<$allowsize){
    if(in_array($doctype,$allow)){
        if(move_uploaded_file($tmp_name,$target)){
            echo '文件上传成功';
            echo '文件路径为:'.$target;
        }
    }else{
    	echo "<script> alert('请检查您的文件格式,必须为gif,png或者jpeg'); 
              window.location.href='04-upload-04.html';
             </script>";
    }
}else{
	    	echo "<script> alert('请检查您的文件大小,不能大于150K'); 
              window.location.href='04-upload-04.html';
             </script>";
}
print_r($_FILES);
?>
</body>
</html>
