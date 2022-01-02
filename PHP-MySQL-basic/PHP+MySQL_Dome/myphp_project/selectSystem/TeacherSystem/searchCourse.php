<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
session_start();
if(! isset($_SESSION['username']))
{
    header("Location:../login.php");
    exit();
}
include("../conn/db_conn.php");
include("header.php");
$adminNo=$_SESSION['username'];
?>
<form method="get" action="searchCourse2.php">
    <h2 align="center">请输入查询信息</h2>
    <p align="center">查询&nbsp;<select name="ColumnName">
            <option value="CouNo">课程编号</option>
            <option value="CouName">课程名称</option>
            <option value="Kind">类型</option>
            <option value="Credit">学分</option>
            <option value="Teacher">教师</option>
            <option value="DepartName">开课系部</option>
            <option value="SchoolTime">上课时间</option>
        </select>&nbsp;为&nbsp;
        <input type="text" name="keyWord" />的课程
    </p>
    <p align="center">
        <input type="submit" value="确定" />&nbsp;
        <input type="reset" value="重置" />
    </p>
</form>
</body>
</html>