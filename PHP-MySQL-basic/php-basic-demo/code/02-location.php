<?php

// 这里是在 响应头中添加一个 location 的头信息
// header('Location: 01-content-type.php');
// 客户端浏览器在接收到这个头信息过后会自动跳转到 指定的地址

// 切记不能循环重定向
header('Location: 03-location2.php');
