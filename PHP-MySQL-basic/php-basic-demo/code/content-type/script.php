<?php
// 通过 HTTP 响应头告诉客户端我们给你的内容是 CSS 代码
header('Content-Type: application/javascript');
?>

alert(1);
