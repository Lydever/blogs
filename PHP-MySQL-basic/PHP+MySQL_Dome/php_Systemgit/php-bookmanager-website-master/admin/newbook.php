<div id="main">
    <div class="hr"><hr /></div>
    <div id="example">
        <?php
        @$admin = $_SESSION['admin'];
        if($admin == "")
        {
            echo "<h2>请 先 登 录 管 理 员 账 号</h2>";
        }
        else
        {
            ?>
            <h2>新 书 入 库</h2>
            <blockquote>
                <p>请认真填写以下内容：</p>
            </blockquote>
            <form id="form1" method="post" action="addbook.php">
                <fieldset>
                    <ul>
                            <label for="lbookid">图书编号:</label>
                            <input id="bookid" type="text" name="bookid" value="" /> *<br>
                            <label for="lbookname">图书名称:</label>
                            <input id="bookname" type="text" name="bookname" value="" /> *<br>
                            <label for="lbookauthor">图书作者:</label>
                            <input id="bookauthor" type="text" name="bookauthor" value="" /> *<br>
                            <label for="lpublish">出版社:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input id="publish" type="text" name="publish" value="" /> *<br>
                            <label for="lpdate">出版日期: </label>
                            <input id="pdate" type="text" name="pdate" value="" /> *<br>
                            <label for="lprice">图书单价: </label>
                            <input id="price" type="text" name="price" value="" /> *<br>
                            <label for="lamount">图书数量: </label>
                            <input id="amount" type="text" name="amount" value="" /> *<br>
                            <label for="lstate">当前状态: </label>
                            <input id="state" type="text" name="state" value="" /> *<br>
                            <label for="lmemo">图书简介: </label>
                            <input id="memo" type="text" name="memo" width="200" height="20" value="" /> *<br>
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="重 填" />
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="提 交" />
                    </ul>
                </fieldset>
            </form>
            <?php
        }
        ?>
    </div>

