<?php
class useros
{

    //用户注销登录
    function logout($tuserid)
    {
        //判断取得的用户信息是否为空
        //如果为空显示错误信息
        if($tuserid == "")
        {
            echo "<msg>";
            echo " "."<br><br><br><br>";
            echo "你还没有进行登录，所以不能执行此操作，请先登录！";
            echo "<br>";
            echo "<a href='index.php' >返回</a>";
            echo "</msg>";
        }
        else
        {
            //如果用户信息不为空,注销当前用户
            echo "<msg>";
            echo " "."<br><br><br><br>";
            echo "<b>注 销 用 户</b><br>";
            echo "用户ID：[";
            echo $tuserid;
            $_SESSION['userid'] = "";
            $_SESSION['name'] = "";
            echo "]<br><b>操作结果：</b>注销登录成功！";
            echo "<br>";
            echo "<a href='index.php'>返回</a><br>";
            echo "</msg>";
        }
    }

    //用户注册
    function registeruser($tname,$tuserid,$tpass,$tconfirmpass,$tmemo,$tsex,$ttelephone)
    {
        require "conn.php";
        $sql = "select * from $user where userid = '$tuserid' ";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);
        if(($tname=="") or ($tuserid=="") or ($tpass=="") or ($tconfirmpass=="") or ($tmemo=="") or($tsex=="") or($ttelephone==""))
        {
            echo "<script language=javascript>alert('带*号的选项必须填写全！');history.go(-1)</script>";
            exit;
        }
        if($num>0)
        {
            echo "<script language=javascript>alert('注册失败，此用户已注册！');history.go(-1)</script>";
            exit;
        }
         if($tpass != $tconfirmpass)
         {
             echo "<script language=javascript>alert('前后两次输入的密码不一致！');history.go(-1)</script>";
             exit;
         }
         if($tsex=="male")
             $ttsex="男";
        if($tsex=="female")
            $ttsex="女";

        date_default_timezone_set("PRC");
        $registerdate = date("Y-m-d");

         $query = "INSERT INTO $user(userid,name,pass,memo,sex,telephone,registerdate)"
             ."VALUES('$tuserid','$tname','$tpass','$tmemo','$ttsex','$ttelephone','$registerdate')";

        $result = mysql_query($query) or die("插入出现错误: " . mysql_error());
        $rowid = mysql_insert_id();
        if ($rowid>0)
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "用户注册成功！<p>";
            echo "新注册的用户是：".$tname;
            echo "<br><a href='index.php'>返回</a>";
            echo "</msg>";
        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "注册失败！<p>";
            echo "<br><a href='index.php'>返回</a>";
            echo "</msg>";
        }
    }

    //用户登录检查
    function loginchk($tuserid,$tpwd,$user)
    {
        $query = "select * from $user where userid = '$tuserid'";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        //判断是否存在当前会员
        if($num>0)
        {
            $row = mysql_fetch_array($result);
            $id = $row['id'];
            $userid = $row['userid'];
            $name = $row['name'];
            $pass = $row['pass'];

            if ($pass==$tpwd)
            {
                $_SESSION['userid'] = $userid;
                $_SESSION['name'] = $name;
                echo "<msg>";
                echo " "."<br><br><br>";
                echo "用户登录成功！<p>";
                echo "登录用户是：".$_SESSION['name']."<p>";
                echo "现在你可以<a href='index.php'>回到首页</a>";
                echo "</msg>";
            }
            else
            {
                echo "<msg>";
                echo " "."<br><br><br>";
                echo "用户登录失败！<p>";
                echo "用户密码不正确！";
                echo "<br><a href='index.php'>请重新登录</a>";
                echo "</msg>";
            }

        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "用户登录失败！<p>";
            echo "当前用户不存在！";
            echo "<br><a href='register.php'>请进行注册！</a>";
            echo "</msg>";
        }
    }


    //查看所有图书
    function allbook($page,$psize)
    {
        echo "<div id='main'>";
        echo "<div class='hr'><hr /></div>";
        echo "<div id='example'>";

        // 建立数据库连接
        require "conn.php";
        // 获取当前页数

        // 每页数量
        $page_size = $psize;
        // 获取总数据量
        $sql = "select count(*)  from $book";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $amount = $row[0];
        //echo $amount;
        // 记算总共有多少页
        if($amount)
        {
            if( $amount < $page_size )
            {
                //如果总数据量小于$pagesize，那么只有一页
                $page_count = 1;
            }
            //取总数据量除以每页数的余数
            if( $amount % $page_size )
            {
                //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
                $page_count = (int)($amount / $page_size) + 1;
            }
            else
            {
                //如果没有余数，则页数等于总数据量除以每页数的结果
                $page_count = $amount / $page_size;
            }
        }
        else
        {
            $page_count = 0;
        }

        echo "<h2>所 有 图 书</h2>";
        echo "<blockquote>";
        echo "<p>管理员可以查看、修改及删除下述图书记录:</p>";
        echo "</blockquote>";

        echo "<fieldset>";
        echo "<ul>";
        echo "</ul>";
        echo "<ol>";

        // 获取数据，以二维数组格式返回结果
        if( $amount )
        {
            $sql = "select * from $book order by id desc limit ". ($page-1)*$page_size .", $page_size";
            $result = mysql_query($sql);
            $num = mysql_num_rows($result);
            ?>
<table border="1">
    <tr>
        <th>图 书 编 号 </th>
        <th>图 书 名 称 </th>
        <th>图 书 作 者 </th>
        <th>出 版 社 </th>
        <th>出 版 日 期 </th>
        <th>图 书 单 价 </th>
        <th>图 书 数 量 </th>
        <th>当 前 剩 余 </th>
        <th>图 书 备 注 </th>
    </tr>
            <?php
            for ($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_array($result);
                $id = $row['id'];
                $bookid = $row['bookid'];
                $bookname = $row['bookname'];
                $author = $row['author'];
                $publish = $row['publish'];
                $pdate = $row['pdate'];
                $price = $row['price'];
                $amount = $row['amount'];
                $state = $row['state'];
                $memo = $row['memo'];

                echo "<tr>";
                echo "<td>";
                echo $bookid;
                echo "</td>";
                echo "<td>";
                echo $bookname;
                echo "</td>";
                echo "<td>";
                echo $author;
                echo "</td>";
                echo "<td>";
                echo $publish;
                echo "</td>";
                echo "<td>";
                echo $pdate;
                echo "</td>";
                echo "<td>";
                echo $price;
                echo "</td>";
                echo "<td>";
                echo $amount;
                echo "</td>";
                echo "<td>";
                echo $state;
                echo "</td>";
                echo "<td>";
                echo $memo;
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "没有记录";
        }

        echo "</ol>";
        echo "</fieldset>";

        // 翻页链接
        $page_string = '';
        if( $page == 1 )
        {
            $page_string .= '第一页|上一页|';
        }
        else
        {
            $page_string .= '<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>|';
        }
        if( ($page == $page_count) || ($page_count == 0) )
        {
            $page_string .= '下一页|尾页';
        }
        else
        {
            $page_string .= '<a href=?page='.($page+1).'>下一页</a>|<a href=?page='.$page_count.'>尾页</a>';
        }
        echo "<br>".$page_string;

        echo "</div>";
    }

    //搜索相关的图书
    function searchbook($tbookid,$tbookname,$tbookauthor,$tpublish,$book)
    {
        echo "<div id='main'>";
        echo "<div class='hr'><hr /></div>";
        echo "<div id='example'>";
        // 建立数据库连接
        require "conn.php";
        global $sql1;
        global $sql2;
        //根据条件设计查询语句
        $sql1 = "SELECT count(*)  FROM $book  WHERE ";
        $sql2 = "select * from $book WHERE ";
        if($tbookid != "")
        {
            $sql1 = $sql1." bookid = '$tbookid'";
            $sql2 = $sql2." bookid = '$tbookid'";
        }

        if(($tbookname != "") && ($tbookid != ""))
        {
            $sql1 = $sql1." and bookname = '$tbookname '";
            $sql2 = $sql2." and bookname = '$tbookname '";
        }
        elseif (($tbookname != "") && ($tbookid == ""))
        {
            $sql1 = $sql1."  bookname = '$tbookname '";
            $sql2 = $sql2."  bookname = '$tbookname '";
        }

        if(($tbookauthor != "") && (($tbookid != "") || ($tbookname != "")))
        {
            $sql1 = $sql1." and author = '$tbookauthor '";
            $sql2 = $sql2." and author = '$tbookauthor '";
        }
        elseif ($tbookauthor != "")
        {
            $sql1 = $sql1." author = '$tbookauthor '";
            $sql2 = $sql2." author = '$tbookauthor '";
        }

        if(($tpublish != "") && (($tbookid != "") || ($tbookname != "") || ($tbookauthor != "")))
        {
            $sql1 = $sql1." and publish = '$tpublish '";
            $sql2 = $sql2." and publish = '$tpublish '";
        }
        elseif ($tpublish != "")
        {
            $sql1 = $sql1." publish = '$tpublish '";
            $sql2 = $sql2." publish = '$tpublish '";
        }

        // 获取当前页数
        if( isset($_GET['page']) )
        {
            $page = intval( $_GET['page'] );
        }
        else
        {
            $page = 1;
        }
        // 每页数量
        $page_size = $psize;

        // 获取总数据量
        $result = mysql_query($sql1);
        $row = mysql_fetch_row($result);
        $amount = $row[0];
        //echo $amount;
        // 记算总共有多少页
        if($amount)
        {
            if( $amount < $page_size )
            {
                //如果总数据量小于$pagesize，那么只有一页
                $page_count = 1;
            }
            //取总数据量除以每页数的余数
            if( $amount % $page_size )
            {
                //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
                $page_count = (int)($amount / $page_size) + 1;
            }
            else
            {
                //如果没有余数，则页数等于总数据量除以每页数的结果
                $page_count = $amount / $page_size;
            }
        }
        else
        {
            $page_count = 0;
        }

        echo "<h2>所 有 图 书</h2>";
        echo "<blockquote>";
        echo "<p>管理员可以查看、修改及删除下述图书记录:</p>";
        echo "</blockquote>";

        echo "<fieldset>";
        echo "<ul>";
        echo "</ul>";
        echo "<ol>";

        // 获取数据，以二维数组格式返回结果
        if( $amount )
        {
            $sql2 = $sql2." order by id desc limit ". ($page-1)*$page_size .", $page_size";
            $result = mysql_query($sql2);
            $num = mysql_num_rows($result);
            ?>

    <table border="1">
        <tr>
            <th>图 书 编 号 </th>
            <th>图 书 名 称 </th>
            <th>图 书 作 者 </th>
            <th>出 版 社 </th>
            <th>出 版 日 期 </th>
            <th>图 书 单 价 </th>
            <th>图 书 数 量 </th>
            <th>当 前 剩 余 </th>
            <th>图 书 备 注 </th>
        </tr>

            <?php
            for ($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_array($result);
                $id = $row['id'];
                $bookid = $row['bookid'];
                $bookname = $row['bookname'];
                $author = $row['author'];
                $publish = $row['publish'];
                $pdate = $row['pdate'];
                $price = $row['price'];
                $amount = $row['amount'];
                $state = $row['state'];
                $memo = $row['memo'];

                echo "<tr>";
                echo "<td>";
                echo $bookid;
                echo "</td>";
                echo "<td>";
                echo $bookname;
                echo "</td>";
                echo "<td>";
                echo $author;
                echo "</td>";
                echo "<td>";
                echo $publish;
                echo "</td>";
                echo "<td>";
                echo $pdate;
                echo "</td>";
                echo "<td>";
                echo $price;
                echo "</td>";
                echo "<td>";
                echo $amount;
                echo "</td>";
                echo "<td>";
                echo $state;
                echo "</td>";
                echo "<td>";
                echo $memo;
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "没有记录";
        }

        echo "</ol>";
        echo "</fieldset>";

        // 翻页链接
        $cx = 'bookid='.$tbookid.'&&bookname='.$tbookname.'&&bookauthor='.$tbookauthor.'&&publish='.$tpublish;
        $page_string = '';
        if( $page == 1 )
        {
            $page_string .= '第一页|上一页|';
        }
        else
        {
            // echo $cx;
            $page_string .= '<a href=?'.$cx.'&&page=1>第一页</a>|
			   <a href=?'.$cx.'&&page='.($page-1).'>上一页</a>|';
        }
        if( ($page == $page_count) || ($page_count == 0) )
        {
            $page_string .= '下一页|尾页';
        }
        else
        {
            $page_string .= '<a href=?'.$cx.'&&page='.($page+1).'>下一页</a>|
			   <a href=?'.$cx.'&&page='.$page_count.'>尾页</a>';
        }
        echo "<br>".$page_string;

        echo "</div>";
    }

    //用户查看自己的借阅信息
    function loanbook()
    {
        require "conn.php";
        echo "<div id='main'>";
        echo "<div class='hr'><hr /></div>";
        echo "<div id='example'>";

        $tuserid = $_SESSION['userid'];
        // 建立数据库连接
        require "conn.php";
        // 获取当前页数
        if( isset($_GET['page']) )
        {
            $page = intval( $_GET['page'] );
        }
        else
        {
            $page = 1;
        }
        // 每页数量
        $page_size = $psize;
        // 获取总数据量
        $sql = "select count(*)  from $loan where userid= '$tuserid'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $amount = $row[0];
        //echo $amount;
        // 记算总共有多少页
        if($amount)
        {
            if( $amount < $page_size )
            {
                //如果总数据量小于$pagesize，那么只有一页
                $page_count = 1;
            }
            //取总数据量除以每页数的余数
            if( $amount % $page_size )
            {
                //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
                $page_count = (int)($amount / $page_size) + 1;
            }
            else
            {
                //如果没有余数，则页数等于总数据量除以每页数的结果
                $page_count = $amount / $page_size;
            }
        }
        else
        {
            $page_count = 0;
        }

        echo "<h2>用 户 所 借 图 书</h2>";
        echo "<blockquote>";
        echo "<p>这里将列出用户借阅的相关信息。</p>";
        echo "</blockquote>";

        echo "<fieldset>";
        echo "<ul>";
        echo "</ul>";
        echo "<ol>";

        // 获取数据，以二维数组格式返回结果
        if( $amount )
        {
            $sql = "select * from loan a, book b where a.bookid=b.bookid and userid= $tuserid";
            $result = mysql_query($sql);
            $num = mysql_num_rows($result);

            $sql1 ="select * from $loan where userid= '$tuserid' order by id desc limit ". ($page-1)*$page_size .", $page_size";
            $result1 = mysql_query($sql1);
            ?>

        <table border="1">
            <tr>
                <th>用 户 I D </th>
                <th>图 书 名 称 </th>
                <th>图 书 编 号 </th>
                <th>借 阅 日 期 </th>
                <th>借 阅 数 量 </th>
                <th>备 注 信 息 </th>
            </tr>

            <?php
            for ($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_array($result);

                $userid = $row['userid'];
                $bookid = $row['bookid'];
                $bookname = $row['bookname'];
                $loandate = $row['loandate'];
                $memo = $row['memo'];


                $row1 = mysql_fetch_array($result1);
                $state = $row1['state'];
                if($state==0)
                    $state="已归还";

                echo "<tr>";
                echo "<td>";
                echo $userid;
                echo "</td>";
                echo "<td>";
                echo $bookname;
                echo "</td>";
                echo "<td>";
                echo $bookid;
                echo "</td>";
                echo "<td>";
                echo $loandate;
                echo "</td>";
                echo "<td>";
                echo $state;
                echo "</td>";
                echo "<td>";
                echo $memo;
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "没有存在相关记录！";
        }

        echo "</ol>";
        echo "</fieldset>";

        // 翻页链接
        $page_string = '';
        if( $page == 1 ){
            $page_string .= '第一页|上一页|';
        }
        else{
            $page_string .= '<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>|';
        }
        if( ($page == $page_count) || ($page_count == 0) ){
            $page_string .= '下一页|尾页';
        }
        else{
            $page_string .= '<a href=?page='.($page+1).'>下一页</a>|<a href=?page='.$page_count.'>尾页</a>';
        }

        echo "<br>".$page_string;

        echo "</div>";
    }

    //显示首页最新信息
    function newbob($book,$loan)
    {
        echo "<h2>最 新 图 书</h2>";
        echo "<ol>";

        $query = "select * from $book order by id desc limit 0,5";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        if($num>0)
        {
            for($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_array($result);
                $id = $row['id'];
                $bookid = $row['bookid'];
                $bookname = $row['bookname'];

                echo $bookname."  "."[".$bookid."]"."<br>";
            }
        }
        else
        {
            echo "对不起，暂无新书入库";
        }

        echo "</ol>";

        echo "<h2>最 新 借 出 </h2>";
        echo "<ol>";

        $query = "select * from $loan order by id desc limit 0,5";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        if($num>0)
        {
            for($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_array($result);
                $id = $row['id'];
                $userid = $row['userid'];
                $bookid = $row['bookid'];

                echo $bookid."  "."[".$userid."]"."<br>";
            }
        }
        else
        {
            echo "对不起，暂无用户借阅!";
        }

        echo "</ol>";
    }

    function edituser($tid,$tname,$tuserid,$tpass,$tconfirmpass,$tmemo,$tsex,$ttelephone)
    {
        if(($tname=="") or ($tuserid=="") or ($tpass=="") or ($tconfirmpass=="") or ($tmemo=="") or($tsex=="") or($ttelephone==""))
        {
            echo "<script language=javascript>alert('带*号的选项必须填写全！');history.go(-1)</script>";
            exit;
        }
        if($tpass != $tconfirmpass)
        {
            echo "<script language=javascript>alert('前后两次输入的密码不一致！');history.go(-1)</script>";
            exit;
        }
        if($tsex=="male")
            $ttsex="男";
        if($tsex=="female")
            $ttsex="女";
        $query = "update user set name='$tname',userid='$tuserid',pass='$tpass',memo='$tmemo',sex='$ttsex',telephone='$ttelephone' where id='$tid' ";
        $result = mysql_query($query) or die("插入出现错误: " . mysql_error());
        $num = mysql_affected_rows();
        if ($num>0)
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "修改个人信息成功！<p>";
            echo "<br><a href='edituser.php'>返回</a>";
            echo "</msg>";
        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "修改个人信息失败！<p>";
            echo "<br><a href='edituser.php'>返回</a>";
            echo "</msg>";
        }
    }

}
?>
