<?php
require "conn.php";
require "userfun.inc";
?>
<div id="main">
    <div id="welcome">
        <h2>图 书 系 统 用 户 须 知  </h2>
        <br>
        <ol>
            未注册的 用户 可以浏览所有图书馆的藏书信息，但不可以进行搜索。<br>
            用户 注册方可进入用户区，查找到图书馆的藏书信息。<br>
            用户 可以根据 用户ID号 查询自己借阅情况。<br>
            用户 可以通过4种方式 或 他们的组合来搜索自己想要的书。<br>
            用户 可以编辑修改个人信息。<br><br>
            管理员 可以添加、删除及修改图书信息，还可查看所有 用户 的借阅信息以及编辑修改用户个人信息。<br>
            图书借阅和归还，是在已知 用户ID号 的情况下由 管理员 操作完成。<br>
        </ol><br>
    </div>
    <div class="hr"><hr /></div>
    <div id="example">
        <?php
        $ufun = new useros();
        $ufun -> newbob($book,$loan);
        ?>
    </div>

