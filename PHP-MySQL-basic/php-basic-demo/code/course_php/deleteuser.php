
        <?php 
        require "database.php";
           function get_str($str){
           	$val = ($_POST[$str])?$_POST[$str]:null;
           	return $val;
           }
           $s = get_str("delete");
           $connection = mysqli_connect("localhost",'root','');
           if(!$connection){
           	?>
           	<script>
           		alert("数据库连接失败");
           		window.location.href="deleteuser.php";
           	</script>
           	<?php          	
           }
           $sql = "select * from course where 课程号=$s";
           mysqli_select_db($connection,"management");
           $info = mysqli_query($connection,$sql);
           $res = mysqli_num_rows($info);
           if($res){
           	$sql = "delete from course where 课程号=$s";
           	$info = mysqli_query($connection,$sql);
           	   if($info){
           	   	?>
           	   	<script>
           	   		alert('删除课程成功');
           	   		window.location.href="deleteuser.php";
           	   	</script>
           	   	<?php
           	   }else{
           	   	?>
           	   	<script>
           	   		alert('删除课程失败');
           	   		window.location.href="deleteuser.php";
           	   	</script>
           	   <?php
           	   }          	
           }
         ?>
