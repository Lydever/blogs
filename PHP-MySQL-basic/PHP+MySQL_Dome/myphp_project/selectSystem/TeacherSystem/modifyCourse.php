<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:../login.php");
    exit();
}else if($_SESSION['role']<>'teacher'){
    header("Location:../login.php");
    exit();
}

include ('Location:../db_conn.php');
include ("header.php");
$StuNo = $_SESSION['ConNo'];
$detailCourse_sql = "SELECT * FROM  Course where ConNo='$ConNo'";
$detailCourse_res = mysqli_query($conn,$detailCourse_sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改课程信息</title>
</head>
<body>
<center>
    <form action="modifyCourse2.php?CouNo=<?php echo $CouNo ?>" enctype="multipart/form-data">
        <table>
            <tr>
                <td>修改课程信息</td>
            </tr>
            <tr>
                <td rowspan="8"><img src="../uploads/<?php echo $CouNo.".jpg" ?>" alt=""></td>
                <td>编号</td>
                <td><input type="text" name="CouNo" value="<?php echo $row['CouNo'] ?>"></td>
            </tr>
            <tr>
                <td>名称</td>
                <td><input type="text" name="CouName" value="<?php echo $row['CouName'] ?>"></td>
            </tr>
            <tr>
                <td>类型</td>
                <td><?php echo $row['Kind'] ?>
                    <select name="Kind" id="Kind">
                        <option value="信息技术">信息技术</option>
                        <option value="工程技术">工程技术</option>
                        <option value="信息技术">信息技术</option>
                        <option value="人文">人文</option>
                        <option value="管理">管理</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>学分</td>
                <td><input type="text" name="Credit" value="<?php echo $row['Credit'] ?>"></td>
            </tr>
            <tr>
                <td>教师</td>
                <td><input type="text" name="Credit" value="<?php echo $row['Teacher'] ?>"></td>
            </tr>
            <tr>
                <td>所属系部</td>
                <td><input type="text" name="DepartName" value="<?php echo $row['DepartName'] ?>"></td>
            </tr>
            <tr>
                <td>限定人数</td>
                <td><input type="text" name="LimitNum" value="<?php echo $row['LimitNum'] ?>"></td>
            </tr>
            <tr>
                <td>图片</td>
                <td><input type="file" name="photo"></td>
            </tr>
        </table>
        <input type="submit" value="确定" />
        <input type="reset" value="重置" />
    </form>
</center>
</body>
</html>





























