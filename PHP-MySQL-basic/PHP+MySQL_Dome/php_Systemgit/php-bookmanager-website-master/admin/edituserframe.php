<div id="content">
    <div id="main">
            <h2>所有用户信息</h2>
        <a href='searchuser.php'>点 击 进 行 查 找 </a><br>

                <?php
                // 建立数据库连接
                require "conn.php";
                // 获取当前页数
                if( isset($_GET['page']) ){
                    $page = intval( $_GET['page'] );
                }
                else
                {
                    $page = 1;
                }
                // 每页显示用户数量
                $page_size = 4;
                // 获取总数据量
                $sql = "select count(*)  from $user";
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
                ?>
        <br><table border="1">
            <tr>
                <th>用户信息</th>
                <th>操作</th>
            </tr>
                    <?php
                    // 获取数据，以二维数组格式返回结果
                    if( $amount )
                    {
                    $sql = "select * from $user order by id asc limit " . ($page - 1) * $page_size . ", $page_size";
                    $result = mysql_query($sql);
                    $num = mysql_num_rows($result);


                    for ($i = 0;$i < $num;$i++)
                    {
                    $row = mysql_fetch_row($result);
                    $id = $row[0];
                    $userid = $row[1];
                    $name = $row[2];
                    $memo = $row[4];
                    $sex = $row[5];
                    $telephone = $row[6];
                    $registerdate = $row[7];
                    ?>
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
            <?php
            }

            }
            else
            {
                echo "没有记录";
            }
            ?>
        </table>

            <?php
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
            ?>
            </li>
            </ol>
        </div>
    </div>

