<div id="main">
    <div class="hr"><hr /></div>
    <div id="example">

            <h2>用 户 注 册</h2>
            <blockquote>
                <p>请认真填写以下个人信息</p>
            </blockquote>
            <form id="form1" method="post" action="registerok.php">
                <fieldset>
                    <ul>

                            <label for="lname">用户姓名:</label>
                            <input id="name" type="text" name="name" value="" /> *<br>

                        用户性别：<select name = "sex" style='width:170px;text-align:center;text-align-last:center;'>
                            <option value="male" selected="selected" >男</option>
                            <option value="female" >女</option>
                        </select> *<br>

                            <label for="lname">用户电话:</label>
                            <input id="name" type="text" name="telephone" value="" /> *<br>

                            <label for="luserid">用户ID     :</label>
                            <input id="userid" type="text" name="userid" value="" /> *<br>

                            <label for="lpass">用户密码:</label>
                            <input id="pass" type="password" name="pass" value="" /> *<br>

                            <label for="lconfirmpass">确认密码:</label>
                            <input id="confirmpass" type="password" name="confirmpass" value="" /> *<br>

                            <label for="lmemo">个人简介:</label>
                            <input id="memo" type="text" name="memo" value="" /> *<br>

                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="重 填" />
                            <input id="inputsubmit1" type="submit" name="inputsubmit1" value="提 交" />
                    </ul>
                </fieldset>
            </form>
    </div>

