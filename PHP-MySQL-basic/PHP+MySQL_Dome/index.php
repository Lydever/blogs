<?php

require "conf/config.php";

if ($siteclose_flag)

{

        echo $sitereason;

    exit();

}

session_start();

require("link.php");

?>

<html>

<head>

    <title><?php echo $sitename ?> -- 首页</title>

    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">

    <?php echo $http_head; ?>

    <link rel="stylesheet" href="conf/style.css" type="text/css">

</head>

<body bgcolor="#FFFFFF" text="#000000">

<?php include "conf/header.php" ?>

<table width="750" border="0" align="center">

      <tr>

            <td width="158" valign="top" align="center" class="softtitle">

                  <table width="98%" border="0" cellpadding="1" cellspacing="0">

                        <tr>

                              <td bgcolor="#cccccc" height="57">

                                    <table width=100% border=0 cellspacing=0 cellpadding=0>

                                          <tr>

                                                <td height=20 bgcolor=#F0F788 align=center><font color="#663300">用户登录</font></td>

                                              </tr>

                                          <tr>

                                                <td height=2 bgcolor=#000000><spacer type=block width=1></td>

                                              </tr>

                                          <tr>

                                                <td class=p7 bgcolor="#FFFFFF"  align="center">

                                                      <table align=center border=0 cellpadding=0 cellspacing=3

                                                             width="100%">

                                                            <form action="login.php" method=post name=login onSubmit="return(check());">

                                                                  <tbody>

                                                                  <tr>

                                                                        <td width="35%" align="right" height="43">

                                                                              <script language="JavaScript">

                                                        function check()

                                                        {

                                                            document.login.submit.disabled=true;

                                                            document.login.submit2.disabled=true;

                                                        }

                                                    </script>

                                                                              用户名<b>：</b></td>

                                                                        <td width="65%" height="43">

                                                                              <input class=think name=u_name size=10>

                                                                            </td>

                                                                      </tr>

                                                                  <tr>

                                                                        <td width="35%" align="right" height="20"> 密　码<b>：</b></td>

                                                                        <td width="65%" height="20">

                                                                              <input class=think name=u_pass size=10

                                                                                                       type=password>

                                                                            </td>

                                                                      </tr>

                                                                  <tr align="center">

                                                                        <td colspan=2 height=34 width="65%">

                                                                              <input name=submit type=submit value=登录 class="think">

                                                                              　

                                                                              <input name=submit2 onClick="JavaScript:window.location.href='register1.php'" type=button value=注册 class="think">

                                                                              <input type="hidden" name="url" value="<?php echo $url ?>">

                                                                            </td>

                                                                      </tr>

                                                                  <tr align="center">

                                                                        <td colspan=2 height=20 width="65%"><img height=11

                                                                                                                                   src="images/forget.gif" width=11> &nbsp;我忘记了密码，<a

                                                                          href="password.php"><font

                                                                              color=#ce0929>请点击这儿！</font></a></td>

                                                                      </tr>

                                                                  </tbody>

                                                                </form>

                                                          </table>

                                                    </td>

                                              </tr>

                                        </table>

                                  </td>

                            </tr>

                      </table>

                  <br>

                  <table width=100% border=0 cellspacing=0 cellpadding=0>

                        <tr>

                              <td height=20 bgcolor=#7A5E12 align=center><font color="#FFFFFF">产品分类</font></td>

                            </tr>

                        <tr>

                              <td height=1 bgcolor=#000000><spacer type=block width=1></td>

                            </tr>

                        <tr>

                              <td class=p7 bgcolor="#FAEEFD" style="line-height:150%" align="center">

                                    <?php

                        $db->query("select id,name from $class_t where up_id=0");

                        $h=0;

                        while($db->next_record())

                             {

                               echo "<a href=\"javascript:void(0);\" οnclick=\"showmenu(menu$h,".$db->num_rows().");\"><b><font color=\"#333399\">[ </font></b><font color=\"#FF3333\">".$db->f("name")."</font><font color=\"#333399\"><b> ]</b></font></a><BR>\n";

   echo "<table id=\"menu$h\" style=\"display:none\" width=\"98%\" border=\"0\" cellspacing=\"3\" cellpadding=\"0\"><tr align=\"center\">\n";

   $db2->query("select id,name from $class_t where up_id=".$db->f("id"));

   $i=0;

   while($db2->next_record()){
    if ($i%2 == 0) echo "</tr><tr align=\"center\">\n";

   echo "<td width=\"50%\" height=\"25\">";

    echo "<a href=\"index.php?sf=".$db2->f("id")."&text=".$db2->f("name")."&sh=$h\" class=\"clink03\">".$db2->f("name")."</a>";

    echo "</td>";

    $i++;

   }

   echo "</tr></table>";

   $h++;

 }

?>

                                  </td>

                            </tr>

                      </table>

                 

                  <script language="JavaScript">

                <?php

                if (isset($sh))

                       echo "showmenu(menu$sh,$h);";

                ?>

                function showmenu(name,num)

                {

                    flag=name.style.display;

                    for(i=0;i<num;i++)

                        eval("menu"+i+".style.display='none';");

                    if (flag=="none")

                        name.style.display="";

                    else

                        name.style.display="none";

                }

                function winopen(url,flag)

                {

                    window.open(url,flag,"toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=yes,width=640,height=450,top=60,left=80");

                }

            </script>

                  <br></td>

            <td valign="top">

                  <?php if (isset($login_name))

            {

                 

 echo "亲爱的 <font color='#cc0000'>".$login_name."</font>，您好!欢迎您光临!";

}

            else

                 echo "亲爱的顾客，您好!欢迎您光临! <a href='login.php' class='clink03'>[请登录]</a> ";

echo " 上次登录时间：".$cookielogintime;

 

  if ($f) $tmp="where class_id=$f";

  

  if ($up_id)

                    $tmp="where up_id=$up_id";

  if ($sf)

                     $tmp="where class_id=$sf";

     

  if (!$page) $page=1;

  $db->query("select null from $goods_t ".$tmp);

  $total_num=$db->num_rows();//得到总记录数

  $totalpage=ceil($total_num/$num_to_show);//得到总页数

  $init_record=($page-1)*$num_to_show;

  $db->query("select id,name,image,price_m,price,state

   from $goods_t $tmp

   order by id DESC limit $init_record, $num_to_show");  

?>

                  <table width="99%" border="0">

                        <tr>

                              <td bgcolor="#333366"><font color="#FFFFFF">

                                        <?php if ($text) echo "您正在浏览 $text 类产品"; ?>

                                        </font></td>

                            </tr>

                      </table>

                  <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">

                        <tr>

                              <?php

                      $i=0;

  while($db->next_record())

                          {

                          if ($i%2==0) echo "</tr><tr>";

?>

                                  <td width="50%" align="center">

                                        <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center" height="120">

                                              <tr>

                                                    <td colspan="3" height="4"></td>

                                                  </tr>

                                              <tr>

                                                    <td width="20%" align="center">

                                                          <?php

                                                   echo "<a href='goods_list.php?id=".$db->f('id')."' target='_blank'><img src='".show_img($db->f('image'),50,50)." border='0'></a>";

            ?>

                                                        </td>

                                                    <td width="2" valign="top">&nbsp;</td>

                                                    <td width="77%" valign="top"><b><font class=p14 color=#000000>

                                                                  <?php echo "<a href='goods_list.php?id=".$db->f('id')."' class='softtitle' target='_blank'>".stripslashes($db->f('name'))."</a>"; ?>

                                                                  </font></b><br>

                                                          零售价：<strike><font color=red>

                                                                  <?php echo $db->f('price_m'); ?>

                                                                  </font></strike>元<br>

                                                          会员价：<font class=p13 color=#ff3333

                                                                                      size=2><?php

                                                       if ($user_price)

                                                             if (isset($login_name))

                                                                echo $db->f('price');

             else

               echo "";

           else

              echo $db->f('price');

            ?>

                                                              </font>元<br>

                                                          状态：<font color=red>

                                                              <?php        

           if ($db->f('state')==0)  echo "有货";

           if ($db->f('state')==1)  echo "缺货";

           ?>

                                                              </font><br>

                                                          <a href="shopping.php?id=<?php echo $db->f('id') ?>" target="cart"><img src="images/gou.gif" width="60" height="22" border="0"></a>

                                                          <a href="shopping.php?id2=<?php echo $db->f('id') ?>" target="cart">

                                                              <img src="images/sc.gif" width="60" height="22" border="0"></a></td>

                                                  </tr>

                                              <tr>

                                                    <td colspan="3"><img src="images/spacer.gif" width="1" height="1"></td>

                                                  </tr>

                                              <tr >

                                                    <td colspan="3" background="images/line1.gif"><img src="images/spacer.gif" width="1" height="1"></td>

                                                  </tr>

                                            </table>

                                      </td>

                                  <?php

       $i++;

       }

       ?>

                            </tr>

                      </table>

            <table width="100%" border="0" cellspacing="1" cellpadding="1">

                        <form action="<?php echo $PHP_SELF."?up_id=$up_id&sf=$sf" ?> " method="post" name="form8" onSubmit="return check_page('form8.page')">

                              <tr>

                                    <td align="right"> 总计:

                                          <?php echo $total_num." ";

                              $page1=$page-1;

  $page2=$page+1;

  if ($page1 < 1) echo "<FONT color=#999999>首页&nbsp;上一页</FONT>&nbsp;";

  else echo "<a href='$PHP_SELF?page=1&up_id=$up_id&sf=$sf'>首页</a>&nbsp;<a href='$PHP_SELF?page=$page1&up_id=$up_id&sf=$sf'>上一页</a>&nbsp;";

  if ($page2 > $totalpage) echo "<FONT color=#999999>下一页&nbsp;尾页</FONT>&nbsp;";

  else echo "<a href='$PHP_SELF?page=$page2&up_id=$up_id&sf=$sf'>下一页</a>&nbsp;<a href='$PHP_SELF?page=$totalpage&up_id=$up_id&sf=$sf'>尾页</a>&nbsp;";

?>

                                          当前页:<b>

                                              <?php echo $page."/".$totalpage ?>

                                              </b>&nbsp;

                                          <script language="JavaScript">

                                function check_page(name)

                                {

                                    eval("page="+name+".value");

                                    if (isNaN(page) || page <=0 || page > <?php echo $totalpage ?>)

                                    {

                                        alert ("请正确输入页数，最大值为 <?php echo $totalpage ?> ！");

                                        eval(name+".select()");

                                        return false;

                                    }

                                }

                            </script>

                                          转到第

                                          <input type="text" name="page" size="2">

                                          <input type="submit" name="Submit22" value="GO">

                                        </td>

                                  </tr>

                            </form>

                      </table>

                </td>

            <td width="170" valign="top" align="center">

                  <table border=0 cellpadding=0 cellspacing=0 width=100%>

                        <tbody>

                        <tr>

                              <td bgcolor=#ff6600 height=22 valign=top width="5%"><img height=19

                                                                                                   src="images/jiao.gif" width=5></td>

                              <td bgcolor=#ff660 height=22 valign=center width="15%"><img

                                        height=21 src="images/bikegif.gif" width=35></td>

                              <td bgcolor=#ff6600 height=22 valign=center width="80%"><img

                                        height=1 src="images/spacer.gif" width=3><img height=18

                                                                                                  src="images/gwc_new.gif" width=116></td>

                            </tr>

                        <tr valign=top>

                              <td colspan=3>

                                    <table align=center border=0 cellpadding=0 cellspacing=0

                                                       width="100%">

                                          <tbody>

                                          <tr>

                                                <td bgcolor=#ffcc00><img height=1

                                                                                           src="images/spacer.gif" width=1></td>

                                              </tr>

                                          <tr>

                                                <td bgcolor=#ffcc00 valign=top>

                                                      <table align=center border=0 cellpadding=0 cellspacing=0

                                                                               width="99%">

                                                            <tbody>

                                                            <tr>

                                                                  <td bgcolor=#ffffff valign=top><iframe frameborder=0

                                                                                                                                 height=182 name=cart scrolling=no

                                                                                                                                 src="shopping.php"

                                                                                                                             width="100%"></iframe></td>

                                                                </tr>

                                                            </tbody>

                                                          </table>

                                                    </td>

                                              </tr>

                                          <tr>

                                                <td bgcolor=#ffcc00 height=1><img height=1

                                                                                                    src="images/spacer.gif"

                                                                                          width=1></td>

                                              </tr>

                                          </tbody>

                                        </table>

                                  </td>

                            </tr>

                        </tbody>

                      </table>

                  <br>

                  <br>

                  <table width="98%" border="0" cellpadding="1" cellspacing="0">

                        <tr>

                              <td bgcolor="#750000">&nbsp;</td>

                            </tr>

                      </table>
