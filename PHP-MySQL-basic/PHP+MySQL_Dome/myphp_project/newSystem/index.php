<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻管理系统</title>
    <script>
        function dodel(id){
            if (confirm("确定要删除吗")){
                window.location="action.php?action=del&id="+id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php include ("menu.php");?>
    <h3>浏览新闻</h3>
    <table width="800" border="1">
        <tr>
            <th>新闻id</th>
            <th>新闻标题</th>
            <th>关键字</th>
            <th>作者</th>
            <th>发布时间</th>
            <th>新闻内容</th>
            <th>操作</th>
        </tr>
        <?php
         require ("dbconfig.php");
         $link=@mysqli_connect(HOST,USER,PASS) or die("数据库连接失败!");//连接mysql
         mysqli_select_db(DBNAME,$link); //选择数据库

        //执行查询并返回结果集
        $sql="select * from news order by addtime desc";
        $result=mysqli_query($sql,$link);

        //解析结果集 并遍历
        while($row =mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['keywords']}</td>";
            echo "<td>{$row['author']}</td>";
            echo "<td>".date("Y-m-d",$row['adatime'])."</td>";
            echo "<td>{$row['content']}</td>";
            echo "<td><a href=''javascript:dodel({$row['id']})>删除</a><a href='edit.php?id={$row['id']}'>修改</a></td>";
            echo"</tr>";
        }


        //释放结果集
        mysqli_free_result($result);
        mysqli_close($link);

        ?>
    </table>
</center>

</body>
</html>



























