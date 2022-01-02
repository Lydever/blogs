<?php
class adminos
{

    //管理员注销登录
    function logout($tadmin)
    {
        //判断取得的用户信息是否为空
        //如果为空显示错误信息
        if($tadmin == "")
        {
            echo "<msg>";
            echo " "."<br><br><br><br>";
            echo "<b>本站提示</b>";
            echo "你还没有进行登录，所以不能执行此操作，请先登录！";
            echo "<br>";
            echo "<a href='index.php' >我要登录</a>";
            echo "<br>";
            echo "<a href='../user/index.php' >返回首页</a>";
            echo "</msg>";
        }
        else
        {
            //如果用户信息不为空,注销当前用户
            echo "<msg>";
            echo " "."<br><br><br><br>";
            echo "<b>注 销 用 户</b><br>";
            echo "会员ID：[";
            echo $tadmin;
            $_SESSION['admin'] = "";
            echo "]<br><b>操作结果：</b>注销成功！";
            echo "<br>我要转到：";
            echo "<a href='index.php'>重新登录</a><br>";
            echo "<a href='../user/index.php'>返回首页</a>";
            echo "</msg>";
        }
    }

    //管理员登录检查
    function loginchk($tadmin,$tpwd,$admin)
    {
        $query = "select * from $admin where adminid = '$tadmin'";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        //判断是否存在当前会员
        if($num>0)
        {
            $row = mysql_fetch_array($result);
            $id = $row['id'];
            $admin = $row['adminid'];
            $pwd = $row['adminpwd'];

            if ($pwd==$tpwd)
            {
                $_SESSION['admin'] = $admin;
                echo "<msg>";
                echo " "."<br><br><br>";
                echo "管理员登录成功！<p>";
                echo "登录管理员是：".$_SESSION['admin']."<p>";
                echo "现在你可以 <a href='index.php'> 回到管理首页</a>";
                echo "<br>或转到本站首页 <a href='../user/index.php'> 本站首页</a>";
                echo "</msg>";
            }
            else
            {
                echo "<msg>";
                echo "管理员登录失败！<hr><p>";
                echo "管理员密码不正确！";
                echo "<br><a href='index.php'>请重新登录</a>";
                echo "</msg>";
            }

        }
        else
        {
            echo "<msg>";
            echo "管理员登录失败！<hr><p>";
            echo "当前管理员不存在！";
            echo "<br><a href='../user/index.php'>返回首页</a>";
            echo "</msg>";
        }
    }

    //添加新书
    function addbook($tbookid,$tbookname,$tauthor,$tpublish,$tpdate,$tprice,$tamount,$tstate,$tmemo,$book)
    {
        if(($tbookid=="") or ($tbookname=="") or ($tauthor=="") or ($tpublish=="") or ($tpdate=="") or ($tprice=="") or ($tamount=="") or ($tstate==""))
        {
            echo "<script language=javascript>alert('带*号的选项必须填写全！');history.go(-1)</script>";
            exit;
        }
        if(substr_count("$tbookid", " ")>0 or substr_count("$tbookid", "　")>0 )
        {
            echo "<script language=javascript>alert('图书编号不能有空格');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[_a-z0-9A-Z-]/",$tbookid))
        {
            echo "<script language=javascript>alert('图书编号的格式不对，只能是英文或者数字');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[0-9-]/",$tpdate))
        {
            echo "<script language=javascript>alert('出版日期只能用数字，中间加下画线表示');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[0-9]/",$tamount))
        {
            echo "<script language=javascript>alert('图书数量只能是数字');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[0-9]/",$tstate))
        {
            echo "<script language=javascript>alert('当前图书数量只能是数字');history.go(-1)</script>";
            exit;
        }

        $sql="SELECT bookid FROM $book where bookid='$tbookid'";
        $result=mysql_query($sql);
        if($myrow=mysql_fetch_row($result))
        {
            echo "<script language=javascript>alert('此图书编号已经使用，请重新填写，或修改现有图书信息!');history.go(-1)</script>";
            exit;
        }

        $query = "INSERT INTO $book(bookid,bookname,author,publish,pdate,price,amount,state,memo)"
            ."VALUES('$tbookid','$tbookname','$tauthor','$tpublish','$tpdate','$tprice',"
            ."'$tamount','$tstate','$tmemo')";


        $result = mysql_query($query) or die("插入出现错误: " . mysql_error());
        $rowid = mysql_insert_id();
        if ($rowid>0)
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "新书入库成功！<p>";
            echo "新入库的新书是：".$tbookname."<p>";
            echo "<br><a href='index.php'>继续添加</a>";
            echo "</msg>";
        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "新书入库失败！<p>";
            echo "新书：[".$tbookname."]";
            echo "入库失败！";
            echo "<br><a href='index.php'>重新添加</a>";
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
        mysql_query("set names UTF-8");
        $row = mysql_fetch_row($result);
        $amount = $row[0];
        //echo $amount;
        // 记算总共有多少页
        if ($amount) {
            if ($amount < $page_size) {
                //如果总数据量小于$pagesize，那么只有一页
                $page_count = 1;
            }
            //取总数据量除以每页数的余数
            if ($amount % $page_size) {
                //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
                $page_count = (int)($amount / $page_size) + 1;
            } else {
                //如果没有余数，则页数等于总数据量除以每页数的结果
                $page_count = $amount / $page_size;
            }
        } else {
            $page_count = 0;
        }

        echo "<h2>所 有 图 书</h2>";
        echo "<blockquote>";
        echo "<p>管理员可以查查看、修改及删除下述图书记录:</p>";
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
            mysql_query("set names UTF-8");
            $num = mysql_num_rows($result);
            ?>
<table border="1">
    <tr>
        <th>图 书 编 号 </th>
        <th>图 书 名 称 </th>
        <th>出 版 社 </th>
        <th>图 书 作 者 </th>
        <th>图 书 价 格 </th>
        <th>图 书 数 量 </th>
        <th>当 前 剩 余 </th>
        <th>操 作 </th>
    </tr>
            <?php
            for ($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_array($result);
                $id = $row['id'];
                $bookid = $row['bookid'];
                $author = $row['author'];
                $publish = $row['publish'];
                $bookname = $row['bookname'];
                $price = $row['price'];
                $amount = $row['amount'];
                $state = $row['state'];

                echo "<tr>";
                echo "<td>";
                echo $bookid;
                echo "</td>";
                echo "<td>";
                echo $bookname;
                echo "</td>";
                echo "<td>";
                echo $publish;
                echo "</td>";
                echo "<td>";
                echo $author;
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
                echo "<label for='lbookid'><a href=mdybook.php?id=".$id.">修改</a>--</label>";
                echo "<label for='lbookid'><a href=delbookok.php?id=".$id."&&bookname=".$bookname.">删除</a></label>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "<msg>";
            echo "没有记录";
            echo "</msg>";
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

    //修改图书信息
    function mdybook($tid,$tbookid,$tbookname,$tauthor,$tpublish,$tpdate,$tprice,$tamount,$tstate,$tmemo,$book)
    {

        if(($tbookid=="") or ($tbookname=="") or ($tauthor=="") or ($tpublish=="") or ($tpdate=="") or ($tprice=="") or ($tamount=="") or ($tstate=="") or ($tmemo==""))
        {
            echo "<script language=javascript>alert('带*号的选项必须填写全！');history.go(-1)</script>";
            exit;
        }
        if(substr_count("$tbookid", " ")>0 or substr_count("$tbookid", "　")>0 )
        {
            echo "<script language=javascript>alert('图书编号不能有空格');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[_a-z0-9A-Z-]/",$tbookid))
        {
            echo "<script language=javascript>alert('图书编号的格式不对，只能是英文或者数字');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[0-9-]/",$tpdate))
        {
            echo "<script language=javascript>alert('出版日期只能用数字，中间加下画线表示');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[0-9]/",$tamount))
        {
            echo "<script language=javascript>alert('图书数量只能是数字');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[0-9]/",$tstate))
        {
            echo "<script language=javascript>alert('当前图书数量只能是数字');history.go(-1)</script>";
            exit;
        }

        $sql="SELECT * FROM $book where bookid='$tbookid' && id!='$tid'";
        $result=mysql_query($sql);
        if($myrow=mysql_fetch_row($result))
        {
            echo "<script language=javascript>alert('此图书编号已经使用，请重修改图书信息!');history.go(-1)</script>";
            exit;
        }

        $query = "update $book set bookid='$tbookid',bookname='$tbookname',author='$tauthor',publish='$tpublish',"
            ."pdate='$tpdate',price='$tprice',amount='$tamount',state='$tstate',memo='$tmemo' where id='$tid'";

        $result = mysql_query($query)
        or die("修改出现错误: " . mysql_error());
        $num = mysql_affected_rows();
        if ($num>0)
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "修改图书成功！<p>";
            echo "新修改的图书是：".$tbookname."<p>";
            echo "<br><a href='allbook.php'>返回</a>";
            echo "</msg>";
        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "修改图书失败！<p>";
            echo "图书：[".$tbookname."]";
            echo "修改失败！";
            echo "<br><a href='allbook.php'>返回</a>";
            echo "</msg>";
        }
    }

    //删除图书
    function delbook($tid,$tbookname,$book)
    {
        $query = "DELETE FROM $book WHERE id = '$tid'";
        //处理中文乱码
        mysql_query("set names UTF-8");
        $result = mysql_query($query);
        $num = mysql_affected_rows();
        //判断是否删除成功
        if($num>0)
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "图书删除成功！<p>";
            echo "删除的图书是：".$tbookname."<p>";
            echo "<br><a href='allbook.php'>返回</a>";
            echo "</msg>";
        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "图书删除失败！<p>";
            echo "当前图书不存在！";
            echo "<br><a href='allbook.php'>进行其他操作！</a>";
            echo "</msg>";
        }
    }

    //执行借阅操作
    function addloan($tuserid,$tbookid,$tloandate,$tstate,$tmemo,$loan)
    {

        if(($tuserid=="") or ($tbookid=="") or ($tloandate=="") or ($tstate=="") )
        {
            echo "<script language=javascript>alert('带*号的选项必须填写全！');history.go(-1)</script>";
            exit;
        }
        if (!preg_match("/^[0-9-]/",$tloandate))
        {
            echo "<script language=javascript>alert('借阅日期只能用数字，中间加下画线表示');history.go(-1)</script>";
            exit;
        }

        if (!preg_match("/^[0-9]/",$tstate))
        {
            echo "<script language=javascript>alert('当前图书数量只能是数字');history.go(-1)</script>";
            exit;
        }

        $query = "INSERT INTO $loan(userid,bookid,loandate,state,memo)" ."VALUES('$tuserid','$tbookid','$tloandate','$tstate','$tmemo')";


        $result = mysql_query($query) or die("插入出现错误: " . mysql_error());
        $rowid = mysql_insert_id();
        if ($rowid>0)
        {
            $query2 = "update book set state=amount-$tstate where bookid='$tbookid'";
            mysql_query($query2 ) or die("更新出现错误: " . mysql_error());

            echo "<msg>";
            echo " "."<br><br><br>";
            echo "用户[".$tuserid."]借阅成功！<p>";
            echo "借阅的图书是：".$tbookid."<p>";
            echo "<br><a href='loan.php'>继续借书</a>";
            echo "</msg>";
        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "用户[".$tuserid."]借阅失败！<p>";
            echo "图书：[".$tbookid."]";
            echo "借阅失败！";
            echo "<br><a href='loan.php'>重新借阅</a>";
            echo "</msg>";
        }
    }

    //管理进行还书操作
    function gbbook($tuserid,$tbookid,$tgivebackdate,$tstate,$tmemo,$loan)
    {
        require "conn.php";
        $query1 = "";
        $query = "select * from $loan where userid='$tuserid' and bookid='$tbookid'";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        if($num>0)
        {
            $row = mysql_fetch_array($result);
            $id = $row['id'];
            $userid = $row['userid'];
            $bookid = $row['bookid'];
            $loandate = $row['loandate'];

            $state = $row['state'];
            $memo = $row['memo'];

            if($tstate == $state)
            {
                $query1 = "update $loan set state=0 ,givebackdate='$tgivebackdate' where userid='$tuserid' and bookid='$tbookid'";
            }
            elseif($state > $tstate)
            {
                $query1 = "update $loan set state=state-$tstate ,givebackdate='$tgivebackdate' where userid='$tuserid' and bookid='$tbookid'";
            }
            else
            {
                echo "<msg>";
                echo " "."<br><br><br>";
                echo "归还图书数量有误，请修改！";
                echo "<a href='giveback.php'>返回修改</a><br>";
                echo "</msg>";
            }

            $result = mysql_query($query1) or die("删除、更新出现错误: " . mysql_error());
            $rowid = mysql_affected_rows();
            if ($rowid>0)
            {

                $query2 = "update book set state=state+$tstate  where bookid='$tbookid'";
                mysql_query($query2 ) or die("更新出现错误: " . mysql_error());

                echo "<msg>";
                echo " "."<br><br><br>";
                echo "用户[".$userid."]还书成功！<p>";
                echo "归还的图书是：".$tbookid;
                echo "[数量：".$tstate."]<p>";
                echo "<a href='giveback.php'>返回</a>";
                echo "</msg>";
            }
            else
            {
                echo "<msg>";
                echo " "."<br><br><br>";
                echo "用户[".$userid."]还书失败！<br>";
                echo "图书：[".$tbookid."]";
                echo " 归还失败！";
                echo "<a href='giveback.php'>返回</a>";
                echo "</msg>";
            }
        }
        else
        {
            echo "<msg>";
            echo "没有找到相关记录!<br>";
            echo "<a href='giveback.php'>返回</a>";
            echo "</msg>";
        }
    }

    //管理员查看所有用户的借阅信息
    function alluserloan()
    {
        echo "<div id='main'>";
        echo "<div class='hr'><hr /></div>";
        echo "<div id='example'>";

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
        $sql = "select count(*)  from $loan order by id ";
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

        echo "<h2>所 有 用 户 借 阅 信 息</h2>";
        echo "<blockquote>";
        echo "<p>这里将列出所有用户的借阅信息。</p>";
        echo "</blockquote>";
        echo "<fieldset>";
        echo "<ul>";
        // 获取数据，以二维数组格式返回结果
        if( $amount )
        {
            $sql = "select * from $loan order by id  limit ". ($page-1)*$page_size .", $page_size";
            $result = mysql_query($sql);
            $num = mysql_num_rows($result);
            ?>
    <table border="1">
        <tr>
            <th>用 户 ID </th>
            <th>图 书 编 号 </th>
            <th>图 书 名 称 </th>
            <th>借 阅 时 间 </th>
            <th>归 还 时 间 </th>
            <th>借 阅 数 量 </th>
            <th>备 注 </th>
        </tr>
            <?php
            for ($i=0;$i<$num;$i++)
            {
                $row = mysql_fetch_array($result);
                $id = $row['id'];
                $userid = $row['userid'];
                $bookid = $row['bookid'];
                $loandate = $row['loandate'];
                $givebackdate = $row['givebackdate'];
                $state = $row['state'];
                $memo = $row['memo'];

                if($givebackdate=="")
                    $givebackdate="尚未归还";
                if($state==0)
                    $state="已归还";

                $sql1 = "select bookname from book where bookid='$bookid'";
                $result1 = mysql_query($sql1);
                $row1 = mysql_fetch_array($result1);
                $bookname = $row1['bookname'];

                echo "<tr>";
                echo "<td>";
                echo $userid;
                echo "</td>";
                echo "<td>";
                echo $bookid;
                echo "</td>";
                echo "<td>";
                echo $bookname;
                echo "</td>";
                echo "<td>";
                echo $loandate;
                echo "</td>";
                echo "<td>";
                echo $givebackdate;
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
            echo "</msg>";
            echo "没有记录";
            echo "</msg>";
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
    function deluser($tid)
    {
        $query = "DELETE FROM user WHERE id = '$tid'";
        //mysql_query("set names UTF-8");

        $result = mysql_query($query);
        $num = mysql_affected_rows();

        //判断是否删除成功
        if($num>0)
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "用户删除成功！<p>";
            echo "<br><a href='edituser.php'>返回</a>";
            echo "</msg>";
        }
        else
        {
            echo "<msg>";
            echo " "."<br><br><br>";
            echo "用户删除失败！<p>";
            echo "<br><a href='edituser.php'>返 回</a>";
            echo "</msg>";
        }
    }

    function searchuser($tuserid,$tusername,$ttelephone)
    {
        echo "<div id='main'>";
        echo "<div class='hr'><hr /></div>";
        echo "<div id='example'>";
        // 建立数据库连接
        require "conn.php";
        global $sql;
        //根据条件设计查询语句
        $sql = "select * from user WHERE ";
        $sql1 = "SELECT count(*) FROM user WHERE ";
        if(($tuserid != "") && ($tusername == "") && ($ttelephone == ""))
        {
            $sql = $sql." userid = '$tuserid'";
            $sql1 = $sql1." userid = '$tuserid'";
        }

        if(($tuserid == "") && ($tusername != "") && ($ttelephone == ""))
        {
            $sql = $sql."name = '$tusername '";
            $sql1 = $sql1."name = '$tusername '";
        }

        if (($tuserid == "") && ($tusername == "") && ($ttelephone != ""))
        {
            $sql = $sql." telephone = '$ttelephone '";
            $sql1 = $sql1."telephone = '$ttelephone '";
        }

        if(($tuserid != "") && ($tusername != "") && ($ttelephone == ""))
        {
            $sql = $sql." userid = '$tuserid'"." and name = '$tusername '";
            $sql1 = $sql1." userid = '$tuserid'"." and name = '$tusername '";
        }
        if (($tuserid != "") && ($tusername == "") && ($ttelephone != ""))
        {
            $sql = $sql." userid = '$tuserid'"." and telephone = '$ttelephone '";
            $sql1 = $sql1." userid = '$tuserid'"." and telephone = '$ttelephone '";
        }

        if(($tuserid == "") && ($tusername != "") && ($ttelephone != ""))
        {
            $sql = $sql." name = '$tusername'"." and telephone = '$ttelephone '";
            $sql1 = $sql1." name = '$tusername'"." and telephone = '$ttelephone '";
        }
        if (($tuserid != "") && ($tusername != "") && ($ttelephone != ""))
        {
            $sql = $sql." name = '$tusername'"." and telephone = '$ttelephone '"."and userid = '$tuserid'";
            $sql1 = $sql1." name = '$tusername'"." and telephone = '$ttelephone '"."and userid = '$tuserid'";
        }

        $result = mysql_query($sql1);
        $row = mysql_fetch_row($result);
        $amount = $row[0];

        if($amount)
        {
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);

            $id = $row[0];
            $userid = $row[1];
            $name = $row[2];
            $memo = $row[4];
            $sex = $row[5];
            $telephone = $row[6];
            $registerdate = $row[7];

        echo "<h2>用 户 信 息</h2>";
        echo "<fieldset>";
        echo "<ul>";
        ?>
                <?php
                echo "</ul>";
                echo "<ol>";
                ?>

                <br><table border="1">
                <tr>
                    <th>用户信息</th>
                    <th>操作</th>
                </tr>

                <tr>
                    <td>
                        用 户 编 号：<?php echo $id; ?><br>
            用 户 ID：<?php echo $userid; ?><br>
            用 户 姓 名：<?php echo $name; ?><br>
            用 户 性 别：<?php echo $sex; ?><br>
            用 户 电 话：<?php echo $telephone; ?><br>
            注 册 时 间：<?php echo $registerdate; ?><br>
            用 户 简 介：<?php echo $memo; ?><br>
            </td>
            <td>

                <?php echo "<a href=../user/edituser.php?id=".$id.">编 辑 || </a> "; ?>
                <?php echo "<a href=deluserok.php?id=".$id.">删 除</a>"; ?>
            </td>
            </tr>
            </table>

            <?php
        }
                else
                {
                    echo "<msg>";
                    echo "没有记录";
                    echo "</msg>";
                }
                echo "</ol>";
                echo "</fieldset>";
                echo "</div>";
    }
}
?>
