<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../login.php");
    exit();
}else if($_SESSION['role']<>'teacher'){
    header("Location:student.php");
    exit();
}


include ('header.php');

$ConNo = $_POST['CouNo'];
$ConName = $_POST['CouName'];
$Kind =$_POST['Kind'];
$Credit = $_POST['Credit'];
$Teacher = $_POST['Teacher'];
$DepartNo = $_POST['DepartNo'];
$SchoolTime = $_POST['SchoolTime'];
$LimitNum = $_POST['LimitNum'];

$ConNo = tirm($CouNo);
$ConName = tirm($CouName);
$Kind = tirm($Kind);
$Credit = tirm($Credit);
$Teacher = tirm($Teacher);
$SchoolTime = tirm($SchoolTime);
$LimitNum =  tirm($LimitNum);

$addCourse_sql = "insert into Course values('$CouNo',
'$ConName','$Kind','$Credit','$Teacher','$DepartNo','$SchoolTime','$LimitNum',0,0)";

$addCourse_res = mysqli_query($conn,$addCourse_sql);
$target_path = "../uploads/".$CouNo.".jpg";
move_uploaded_file($_FILES['photo']['tmp_name'],$target_path);
if($addCourse_res && file_exists($target_path)){
    echo "<script>";
    echo "alert(\"添加课程成功\")";
    echo "location.href=\"showCourse.php\"";
    echo"</script>";
}else{
    echo "<script>";
    echo "alert(\"添加课程失败,请重新添加\")";
    echo  "location.href=\"addCourse.php\"";
    echo"</script>";
}
















