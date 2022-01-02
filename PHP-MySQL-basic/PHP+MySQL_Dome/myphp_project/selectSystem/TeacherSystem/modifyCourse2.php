<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../login.php");
    exit();
}else if($_SESSION['role']<>'teacher'){
    header("Location:../login.php");
    exit();
}

include ('Location:../conn/db_conn.php');

$ConNo = $_POST['CouNo'];
$ConName = $_POST['CouName'];
$Kind =$_POST['Kind'];
$Credit = $_POST['Credit'];
$Teacher = $_POST['Teacher'];
$DepartNo = $_POST['DepartNo'];
$SchoolTime = $_POST['SchoolTime'];
$LimitNum = $_POST['LimitNum'];

//删除原来的图片
if (file_exists($_FILES['photo']['tmp_name'])){
    $oldpic = "../uploads/".$CouNo.".jpg";
    unlink($oldpic);
    $target_path = "../uploads".$CouNo.".jpg";
    move_uploaded_file($_FILES['photo']['tmp_name'],$target_path);
}

$CouNo = tirm($CouNo);
$CouName = tirm($CouName);
$Credit = tirm($Credit);
$Teacher = tirm($Teacher);
$SchoolTime = tirm($SchoolTime);
$LimitNum =  tirm($LimitNum);

$modifyCoursr_sql = "UPDATE Course SET ConNo='$CouNo', 
ConName='$CouName',Kind='$Kind',Credit='$Credit',Teacher='$Teacher',
DepartNo='$DepartNo',SchoolTime='$SchoolTime',LimitNum='$LimitNum' 
WHERE CouNo='$ConNo'";
$modifyCoursr_res = mysqli_query($conn,$modifyCoursr_sql);
if($modifyCoursr_res){
    echo "<script>";
    echo "alert(\"课程信息修改成功\")";
    echo "location.href=\"showCourse.php\"";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert(\"课程信息修改失败,请重新修改\")";
    echo "location:'javaScript:history.go(-1)'";
    echo "</script>";
}






















