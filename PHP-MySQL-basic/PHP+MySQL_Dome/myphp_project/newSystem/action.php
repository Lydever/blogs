<?php
//实现信息的增删改查

require ("dbconfig.php");

//连接mysql,并选择数据库
$link=@mysqli_connect(HOST,USER,PASS) or die("数据库连接失败!");
mysqli_select_db(DBNAME,$link);
switch ($_GET['action']){

    case "add"://执行添加操作
        //获取要添加的信息并补充其他信息
        $title=$_POST["title"];
        $keywords=$_POST["keywords"];
        $author=$_POST["author"];
        $content=$_POST["content"];
        $addtime=time();

        $sql="insert into news values (null,'{$title}','{$keywords}','{$author}','{$addtime}','{$content}')";
        mysqli-query($sql,$link);

        //判断是否成功
        $id=mysqli_insert_id($link);//获取刚刚添加信息de自增id值
        if($id>0){
             echo "新闻信息添加成功!";
        }else{
             echo "新闻信息添加失败!";
        }
        echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
        echo "<a href='index.php'>浏览新闻</a>";
     break;
    case "del"://执行删除操作
        $id=$_GET['id']; //获取亚删除的id号
        $sql="delete from news where id={$id}";
        mysqli_query($sql,$link);//执行删除操作

        //自动跳转到浏览新闻页面
        header("Location:index.php");
     break;

    case "update":
        $title=$_POST['title'];
        $keywords=$_POST['keywords'];
        $author=$_POST['author'];
        $content=$_POST['content'];
        $id=$_POST['id'];
        $sql="update news set title='{$title}',keywords='{$keywords}',author='{$author}',content='{$content}' where id={$id}";

        mysqli_query($sql,$link);
        header("Location:index.php");//跳回浏览界面
    break;

}


//关闭数据库连接
mysqli_close($link);




















