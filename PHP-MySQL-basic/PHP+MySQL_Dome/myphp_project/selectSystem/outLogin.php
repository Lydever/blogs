<?php
session_start();
$_SESSION = array();
session_destroy();
echo "<script>";
echo "alert(\"您已经安全退出,如有需要请重新登录\")";
echo "location.href=\"login.php\"";

echo "</csript>";

?>