 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form id="form02" name="form02" method="post" action="02_form.php">
 		 您的爱好是:
 		 <select name="interest" id="select">
              <option value="读书" selected="selected">读书</option>
              <option value="睡觉" selected="selected">睡觉</option>
              <option value="设计" selected="selected">设计</option>
              <option value="编程" selected="selected">编程</option>
              <option value="音乐" selected="selected">音乐</option>
 		 <select/>
 		
 		<input type="submit" name="sub_btn" id="sub_btn" value="提交" />

 	</form>
 	<?php
       if($_POST["sub_btn"]=="提交"){
         echo "<br>你的兴趣是:".$_POST["interest"];
       }
 	?>

 </body>
 </html>