<div id="main">
    <div class="hr"><hr /></div>
    <div id="example">
        <?php
        date_default_timezone_set("PRC");
        @$admin = $_SESSION['admin'];
        @$userid = $_SESSION['userid'];
        $ldate = date("Y-m-d");
        if($admin == "")
        {
            echo "<h2>您 没 有 权 限 进 行 操 作 ，请 登 录 管 理 员 账 号 </h2>";
        }
        else
        {
            ?>
            <h2>借 阅 图 书</h2>
            <blockquote>
                <p>请认真填写以下借阅信息：</p>
            </blockquote>
            <form id="form1" method="post" action="addloan.php">
                <fieldset>
                    <ul>
                        <li>
                            <label for="luserid">用户ID:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input id="userid" type="text" name="userid" value="<?php echo $userid;?>" /> *
                        </li>
                        <li>
                            <label for="lbookid">图书编号:</label>
                            <input id="bookid" type="text" name="bookid" value="" /> 或
                            <br />
                            选择编号:
                            <select name="bookid2">
                                <option value="" selected="selected">可以输入，或进行选择</option>
                                <?php
                                $query = "select * from $book order by bookname";
                                $result = mysql_query($query);
                                $num = mysql_num_rows($result);

                                for($i=0;$i<$num;$i++)
                                {
                                    $row = mysql_fetch_array($result);
                                    $id = $row['id'];
                                    $bookid = $row['bookid'];
                                    $bookname = $row['bookname'];
                                    ?>

                                    <option value="<?php echo $bookid;?>" ><?php echo $bookid;?>[<?php echo $bookname;?>]</option>
                                    <?php
                                }
                                ?>
                            </select> *
                        </li>
                        <li>
                            <label for="lloandate">借阅日期:</label>
                            <input id="loandate" type="text" name="loandate" value="<?php echo $ldate;?>" /> *
                        </li>
                        <li>
                            <label for="lstate">图书数量: </label>
                            <input id="state" type="text" name="state" value="" /> *
                        </li>
                        <li>
                            <label for="lmemo">借阅备注: </label>
                            <input id="memo" type="text" name="memo" width="200" height="20" value="<?php echo $admin;?>" /> *
                        </li>
                        <li>
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="重填" />
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="确认提交" />
                        </li>
                    </ul>
                </fieldset>
            </form>
            <?php
        }
        ?>
    </div>
