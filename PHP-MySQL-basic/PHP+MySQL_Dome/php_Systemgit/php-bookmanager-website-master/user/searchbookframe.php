<div id="main">
    <div class="hr"><hr /></div>
    <div id="example">
        <?php
        @$admin = $_SESSION['admin'];
        @$userid = $_SESSION['userid'];
        if(($admin == "") && ($userid == ""))
        {
            echo "<h2>请 先 登 录</h2>";
        }
        else
        {
            ?>
            <h2>查 找 图 书</h2>
            <blockquote>
                <p>请填写要查找的内容，可以填一项或多项。</p>
            </blockquote>
            <form id="form1" method="post" action="searchbookok.php">
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

                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="重填" />
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="确认查找" />

                    </ul>
                </fieldset>
            </form>
            <?php
        }
        ?>
    </div>

