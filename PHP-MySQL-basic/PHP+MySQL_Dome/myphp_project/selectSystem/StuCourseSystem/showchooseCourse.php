<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:../login.php");
    exit();
}

include ("../db_conn.php");
include ("header.php");
$StuNo = $_SESSION['username'];

$showCourse_sql = "select * from course where ConNo in (select ConNo form stucou where StuNo='$StuNo' order by CouNo)";
$showCourse_res = mysqli_query($conn,$showCourse_sql);
?>

<table align="center">
    <tr bgcolor="blue">
        <td><font color="#fff">课程编码</font></td>
        <td><font color="#fff">课程名称</font></td>
        <td><font color="#fff">课程类别</font></td>
        <td><font color="#fff">学分</font></td>
        <td><font color="#fff">任课教师</font></td>
        <td><font color="#fff">上课时间</font></td>
        <td><font color="#fff">操</font></td>
        <td><font color="#fff">作</font></td>
    </tr>
    <?php
    if(mysqli_num_rows($showCourse_res)>0){
        $number = mysqli_num_rows($showCourse_res);
        if(!isset($_GET['p'])){
            $p=0;
        }else{
            $p = $_GET['p'];
        }
        $check = $p+10;
        for($i=0;$i<$number;$i++){
            $row = mysqli_fetch_array($showCourse_res);
            if($i>=$p && $i<$check){
                if($i%2==0){
                    echo "<tr bgcolor='#ddd'>";
                }else
                    echo "<tr>";
                echo "<td><a href='detailCourse.php?ConNo=".$row['ConNo']."'>".$row['ConNo']."</a></td>";
                echo "<td>".$row['ConName']."</td>";
                echo "<td>".$row['kind']."</td>";
                echo "<td>".$row['Credit']."</td>";
                echo "<td>".$row['ConName']."</td>";
                echo "<td>".$row['Teacher']."</td>";
                echo "<td>".$row['SchoolTime']."</td>";
                echo "<td><a href='modifyCourse.php?ConNo=".$row['ConNo']."'>修改</a></td>";
                ?>
                <td><a href="deleteCourse.php?ConNo=<?=$row['ConNo']?>" onclick="retrun confirm('确定删除?')">删除</a></td><?php echo "</tr>";
                $j = $i+1;
            }
        }
    }

    ?>
</table>
<center><p>点击课程编码连接可以直接看课程细节</p></center><br>
<table>
    <tr>
        <td align="center"><a href="showCourse.php?p=0">第一页</a></td>
        <td align="center">
            <?php
            if($p>9){
                $last = (floor($p/10)*10)-10;
                echo "<a href='showCourse.php?p=$last'>上一页</a>";
            }else{
                echo "上一页";
            }
            ?>
        </td>
        <td align="center">
            <?php
            if($i>9 and $number>$check){
                echo "<a href='showCourse.php?p=$last'>下一页</a>";
            }else{
                echo "下一页";
            }
            ?>
        </td>
        <td align="center">
            <?php
            if($i>9){
                $final = floor($number/10)*10;
                echo "<a href='showCourse.php?p=$final'>最后一页</a>";
            }else{
                echo "最后一页<";
            }
            ?>
        </td>
    </tr>
</table>
