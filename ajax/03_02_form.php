 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form id="form04" method="post" action="03_02_form.php">
 		 请输入"x"或者"+"：
 		<input type="text" name="score" id="score" value="" size="12" />
 		<input type="submit" name="sub_btn" id="sub_btn" value="提交" />

 	</form>

 	<?php
  $su = $_POST["sub_btn"];
  //定义一个变量接收html表单text里传过来的信息
     if($su=="提交"){
       if($_POST["score"]=="x"){
        //"x" 打印输出九九加发表
       echo '<table width="999" border="1">';
         for($i=1;$i<10;$i++){
            for($j=1;$j<=$i;$j++){
            echo '<td align="center">'.$j.'X'.$i.'='.($i*$j).'</td>';
        }
        echo '<br>'.'</tr>';
    }
        echo '</table>'.'<br>';
    }
   
   else{
    //"+"打印输出九九加发表
     echo '<table width="600" border="1" >';
           for($i=1;$i<10;$i++){
               echo '<tr>';
             for($j=1;$j<=$i;$j++){
                 echo '<td align="center">'.$i.'+'.$j.'='.($i+$j).'</td>';
             }
             echo '<br>'.'</tr>';
           }
           echo '</table>';
   }
}
 	?>
 </body>
 </html>