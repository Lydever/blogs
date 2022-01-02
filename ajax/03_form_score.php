
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>

 	<form id="form03" method="post" action="03_form_score.php">
 		 请输入成绩：
 		<input type="text" name="score" id="score" value="" size="12" />
 		<input type="submit" name="sub_btn" id="sub_btn" value="提交" />
 	</form>

 	<?php
 	 $score=$_POST["score"];
 	 if($_POST["sub_btn"]=="提交"){
         echo "你的成绩是:".$_POST["score"]."<br>";
       }
      switch($score){
        case $score>=90:
          echo "你的成绩等级是:优秀";
        break;
        case $score>=80:
          echo "你的成绩等级是:良好";
        break;
        case $score>=60:
          echo "你的成绩等级是:合格";
        break;
       default:
          echo "你的成绩等级是:不合格";
        break;
    }
?>
 </body>
 </html>