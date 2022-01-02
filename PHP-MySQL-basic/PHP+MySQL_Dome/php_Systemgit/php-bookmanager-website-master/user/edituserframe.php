<?php
require "conn.php";
if(@$_SESSION['userid'] != "") {
    $tuserid = $_SESSION['userid'];
    $sql = "select * from $user where userid= '$tuserid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    $id = $row[0];
    $name = $row[2];
    $sex = $row[5];
    $telephone = $row[6];
    $userid = $row[1];
    $pass = $row[3];
    $memo = $row[4];
}
else
{

    $sql = "select * from $user where id= '$tid'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    $id = $row[0];
    $name = $row[2];
    $sex = $row[5];
    $telephone = $row[6];
    $userid = $row[1];
    $pass = $row[3];
    $memo = $row[4];
}

?>

<div id="main">
    <div class="hr"><hr /></div>
    <div id="example">
        <h2>编 辑 用 户 信 息 </h2>
        <blockquote>
            <p>请认真填写需要修改的个人信息 , 如需修改密码请填写新密码。</p>
        </blockquote>
        <form id="form1" method="post" action="edituserok.php">
            <fieldset>
                <ul>
                    <label for="lname">用户编号:</label>
                    <input id="name" type="text" name="editid" value="<?php echo $id?>" readonly = “readonly /> <br>

                    <label for="lname">用户姓名:</label>
                    <input id="name" type="text" name="editname" value="<?php echo $name?>" /> *<br>

                    用户性别：<select name = "editsex" style='width:170px;text-align:center;text-align-last:left;' >
                        <option value="male" selected="selected" >男</option>
                        <option value="female" >女</option>
                    </select> *<br>

                    <label for="lname">用户电话:</label>
                    <input id="name" type="text" name="edittelephone" value="<?php echo $telephone?>" /> *<br>

                    <label for="luserid">用户ID     :</label>
                    <input id="userid" type="text" name="edituserid" value="<?php echo $userid?>" /> *<br>

                    <label for="lpass">用户密码:</label>
                    <input id="pass" type="password" name="editpass" value="<?php echo $pass?>" />* <br>

                    <label for="lpass">确认密码:</label>
                    <input id="pass" type="password" name="editconfirmpass" value="<?php echo $pass?>" />* <br>

                    <label for="lmemo">个人简介:</label>
                    <input id="memo" type="text" name="editmemo" value="<?php echo $memo?>" /> *<br>

                    <input id="inputsubmit1" type="submit" name="inputsubmit1" value="重 填" />
                    <input id="inputsubmit1" type="submit" name="inputsubmit1" value="提 交" />

                </ul>
            </fieldset>
        </form>

    </div>

