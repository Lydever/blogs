<div id="main">
    <div class="hr"><hr /></div>
    <div id="example">
        <?php
        require "conn.php";
        if($_SESSION['admin'] == "")
        {
            echo "<h2>对不起，你不是管理员，没有权限执行该操作！</h2>";
            echo "<script language=javascript>alert('对不起，你不是管理员，没有权限执行该操作！');history.go(-1)</script>";
            exit;
        }
        $tid = $_GET['id'];
        $query = "select * from $book where id='$tid'";
        $result = mysql_query($query);
        $num = mysql_num_rows($result);
        if($num)
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

            ?>
            <h2>修改图书信息</h2>
            <blockquote>
                <p>请按照要求修改以下内容：</p>
            </blockquote>
            <form id="form1" method="post" action="mdybookok.php?id=<?php echo $id;?>">
                <fieldset>
                    <ul>
                        <li>
                            <label for="lbookid">图书编号:</label>
                            <input id="bookid" type="text" name="bookid" value="<?php echo $bookid;?>" /> *
                        </li>
                        <li>
                            <label for="lbookname">图书名称:</label>
                            <input id="bookname" type="text" name="bookname" value="<?php echo $bookname;?>" /> *
                        </li>
                        <li>
                            <label for="lbookauthor">图书作者:</label>
                            <input id="bookauthor" type="text" name="bookauthor" value="<?php echo $author;?>" /> *
                        </li>
                        <li>
                            <label for="lpublish">出版社:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input id="publish" type="text" name="publish" value="<?php echo $publish;?>" /> *
                        </li>
                        <li>
                            <label for="lpdate">出版日期: </label>
                            <input id="pdate" type="text" name="pdate" value="<?php echo $pdate;?>" /> *
                        </li>
                        <li>
                            <label for="lprice">图书单价: </label>
                            <input id="price" type="text" name="price" value="<?php echo $price;?>" /> *
                        </li>
                        <li>
                            <label for="lamount">图书数量: </label>
                            <input id="amount" type="text" name="amount" value="<?php echo $amount;?>" /> *
                        </li>
                        <li>
                            <label for="lstate">当前状态: </label>
                            <input id="state" type="text" name="state" value="<?php echo $state;?>" /> *
                        </li>
                        <li>
                            <label for="lmemo">图书简介: </label>
                            <input id="memo" type="text" name="memo" width="200" height="20" value="<?php echo $memo;?>" /> *
                        </li>
                        <li>
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="重填" />
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="确认修改" />
                        </li>
                    </ul>
                </fieldset>
            </form>
            <?php
        }
        else
        {
            echo "<h2>对不起，没有找到相应的记录。</h2>";
        }
        ?>
    </div>