<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻管理系统</title>
</head>
<body>
<center>
    <?php
      include ("menu.php");
      include ("dbconfig.php");

    $link=@mysqli_connect(HOST,USER,PASS) or("数据库连接失败");
    mysqli_select_db(DBNAME,$link);

    //获取要修改id号
    $sql="select * from news where id={$_GET['id']}";
    $result=mysqli_query($sql,$link);

    //判断是否获取到了要修改的信息
    if($result && mysqli_num_rows($result)>0){
        $news=mysqli_fetch_assoc($result);
    }else{
        die("没有找到要修改的信息!");
    }
    ?>

    <h3>编辑新闻</h3>
               <form action = "action.php?action=update" method="post">
                    <input type="hidden" name="id" value="<?php echo $news['id']; ?>" />
                       <table width="320" border="1">
                          <tr>
                              <td align="right">标题:</td>
                                <td><input type="text" name="title" value="<?php echo $news['title']; ?>" /></td>
                           </tr>
                           <tr>
                               <td align="right">关键字:</td>
                                <td><input type="text" name="keywords" value="<?php echo $news['keywords']; ?>" /></td>
                           </tr>
                           <tr>
                               <td align="right">作者:</td>
                               <td><input type="text" name="author" value="<?php echo $news['author']; ?>" /></td>
                           </tr>
                            <tr>
                                <td align="right" valign="top">内容:</td>
                                 <td><textarea cols="25" rows="5" name="content"><?php echo $news['content']; ?></textarea></td>
                             </tr>
                             <tr>
                                  <td colspan="2" align="center">
                                      <input type="submit" value="编辑"/>&nbsp;&nbsp;
                                      <input type="reset" value="重置"/>

                                  </td>
                               </tr>
                           </table>
                </form>
     </center>
   </body>
</html>