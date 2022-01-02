<?php
include("database.php");
$cid = $_GET['cid'];
$sql = "delete from course where 课程号='$cid'";
$res = mysqli_query($connection,$sql);
if ($res) {
      echo "<script>
            alert('删除课程成功');
             window.loction.href="delete.php";
           </script>";
      }else{
      echo "<script>
            alert('删除课程失败');
            window.location.href="delete.php";
           </script>";
      }
?>

