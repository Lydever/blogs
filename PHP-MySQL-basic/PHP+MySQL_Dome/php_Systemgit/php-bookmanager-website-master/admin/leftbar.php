<div id="content">
    <div id="sidebar">
        <div id="menu">
            <ul>
                <li class="active"><a href="index.php" title="新书入库">新书入库</a></li>
                <li><a href="allbook.php" title="所有图书">所有图书</a></li>
                <li><a href="searchbook.php" title="查找图书">查找图书</a></li>
                <li><a href="loan.php" title="借阅图书">借阅图书</a></li>
                <li><a href="giveback.php" title="归还图书">归还图书</a></li>
                <li><a href="alluserloan.php" title="所有用户借阅记录">所有借阅信息</a></li>
                <li><a href="edituser.php" title="编辑所有用户个人信息">所有用户个人信息</a></li>
                <li><a href="../user/index.php" title="返回用户界面">用户界面</a></li>
            </ul>
        </div>
        <?php
        @$admin = $_SESSION['admin'];
        if($admin == "")
        {
            ?>
            <div id="login" class="boxed">
                <h2 class="title">管理员登录</h2>
                <div class="content">
                    <form id="form1" method="post" action="loginchk.php">
                        <fieldset>
                            <legend>管理员登录</legend>
                            <label for="inputtext1">管理员ID:</label>
                            <input id="inputtext1" type="text" name="admin" value="" />
                            <br>
                            <label for="inputtext2">管理员密码:</label>
                            <br>
                            <input id="inputtext2" type="password" name="password" value="" />
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="登 录" />
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php
        }
        else
        {
            @$id = $_SESSION['id'];
            ?>
            <div id="login" class="boxed">
                <h2 class="title">管理员登录</h2>
                <div class="content">
                    <form id="form1" method="post" action="logout.php">
                        <fieldset>
                            <legend>管理员登录登录</legend>
                            <label for="inputtext1">管理员ID:</label>
                            <label for="inputtext1"><?php echo $admin;?></label>
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
        require "time.php";
        ?>
        </fieldset>
        </div>>
    </div>
