 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form id="form01" method="post" action="01_form.php">
 		 用户名：
 		<input type="text" name="user" id="user" value="" size="12" /><br>
 		 密码：
 		<input type="password" name="pass" id="pass" value="" size="12" />
 		<input type="radio" name="sex" id="radio_man" value="男" checked="checked" />男
 		<input type="radio" name="sex" id="radio_female" value="女" />女
 		<input type="text" name="user" id="user" value="" />
 		<input type="submit" name="sub_btn" id="sub_btn" value="提交" />

 	</form>

 	<?php
       if($_POST["sub_btn"]=="提交"){
         echo "<br>你的用户名是:".$_POST["user"];
         echo "密码是:".$_POST["pass"];
         echo "你的性别是:".$_POST["sex"];
       }
 	?>
 </body>
 </html>