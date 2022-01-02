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
            <h2>查 找 用 户</h2>
            <blockquote>
                <p>请填写要查找的内容，可以填一项或多项。</p>
            </blockquote>
            <form id="form1" method="post" action="searchuserok.php">
                <fieldset>
                    <ul>

                        <label for="luserid">用户id:</label>
                        <input id="userid" type="text" name="userid" value="" /> *<br>

                        <label for="lusername">用户姓名:</label>
                        <input id="username" type="text" name="username" value="" /> *<br>

                        <label for="ltelephone">联系电话:</label>
                        <input id="telephone" type="text" name="telephone" value="" /> *<br>

                        <input id="inputsubmit1" type="submit" name="inputsubmit1" value="重填" />
                        <input id="inputsubmit1" type="submit" name="inputsubmit1" value="确认查找" />

                    </ul>
                </fieldset>
            </form>
            <?php
        }
        ?>
    </div>

