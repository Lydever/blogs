<?php
    header("Content-Type:text/html;charset=UTF-8");
   if(isset($_REQUEST['autocode'])){
      session_start();
      if(strtolower($_POST['autocode']) == $_SESSION['authcode']){
       echo '正确';
      }else{
      echo'错误';
      }

   exit();
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="post"  action="">
         <!-- <p>验证码图片：<img border="1" src="check.php?r="<?php echo rand();?> width="100" height="30"  οnclick=""/></p> -->
         <p>验证码图片：<img border="1" id="capthcha_img" onclick="this.src='randcode_pro.php?r='+Math.random()" src="randcode_pro?r="<?php echo rand();?> width="100" height="30"  /> <a href="javascript:void(0)" onclick="document.getElementById('capthcha_img').src='randcode_pro.php?r='+Math.random()">换一个</a></p>

       <p>输入内容：<input type="text" name="autocode" value="" /></p>

    <p><input type="submit"  value="提交" style="padding:6px 20px;"/></p>


     </form>
</body>
</html>