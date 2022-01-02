<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>成绩结果</title>
</head>
<body>
	<?php
      $date = array();
      $date["001"] = array("name"=>"张三","chinese"=>"122","math"=>"130","english"=>"145");
      $date["002"] = array("name"=>"李四","chinese"=>"100","math"=>"98","english"=>"105");
      $date["003"] = array("name"=>"王五","chinese"=>"82","math"=>"90","english"=>"100"); 
      //用get方式获取html传递过来的值
      $code = $_GET["code"];

      //如果code=date下标数据则执行if里面的语句
      if(array_key_exists($code,$date)){
      	$student = $date[$code];  
	?>

	 <div>
	 	<?php echo $student["name"]?>的成绩如下:
	 	<!--动态拿到student(date)中的数据-->
	 	<ul>
	 		<li>语文:<?php echo $student["chinese"]?>分</li>
	 		<li>数学:<?php echo $student["math"]?>分</li>
	 		<li>英语:<?php echo $student["english"]?>分</li>
	 	</ul>
	 </div>
	 <?php
        }else{
 ?>
 <div>该学号没有成绩</div>
       <?php  
	  }
	?>
</body>
</html>