<div id="content">
    <div id="sidebar">
        <div id="menu">
            <ul>
                <li class="active"><a href="index.php" title="图书管理系统首页">首页</a></li>
                <li><a href="allbook.php" title="所有图书">所有图书</a></li>
                <li><a href="searchbook.php" title="查找图书">查找图书</a></li>
                <li><a href="allloan.php" title="用户借阅信息">用户借阅信息</a></li>
                <li><a href="edituser.php" title="编辑修改用户个人信息">用户个人信息</a></li>
                <li><a href="../admin/index.php" title="进入管理员后台">管理员后台</a></li>
            </ul>
        </div>
        <?php
        @$userid = $_SESSION['userid'];
        if($userid == "")
        {
            ?>
            <div id="login" class="boxed">
                <h2 class="title">用户登录</h2>
                <div class="content">
                    <form id="form1" method="post" action="loginchk.php">
                        <fieldset>
                            <legend>用户登录</legend>
                            <label for="inputtext1">用户ID:</label>
                            <input id="inputtext1" type="text" name="userid" value="" />
                            <br>
                            <label for="inputtext2">用户密码:</label>
                            <br>
                            <input id="inputtext2" type="password" name="password" value="" />
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="登 录" />
                            <?php
                            echo "<br><br>"."没有账号？ ";
                            echo "<a href='register.php'>点击注册</a>";
                            echo "<br><br>";
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php
        }
        else
        {
            ?>
            <div id="login" class="boxed">
                <h2 class="title">用户登录</h2>
                <div class="content">
                    <form id="form1" method="post" action="logout.php">
                        <fieldset>
                            <legend>用户登录</legend>
                            <label for="inputtext1">用户ID:</label>
                            <label for="inputtext1"><?php echo $userid;?></label>
                            <br/>
                            <label for="inputtext1">用户姓名:</label>
                            <label for="inputtext1"><?php echo $_SESSION['name'];?></label>
                            <br/><br/>
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="注 销" />
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
        <div id="time">
            <fieldset>
        <?php
        require  "time.php";
        ?>
            </fieldset>
        </div>>
    </div>
