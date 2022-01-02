<?php

// 设置响应头中的 Set-Cookie 可以下发小票（给客户端发）
// Cookie 在客户端存储的是键值结构
// header('Set-Cookie: foo=bar');

// header 在设置相同的键时 会出现覆盖的情况
// header('Foo: 123');
// header('Foo: 456');

// setcookie 是专门用于设置 cookie 的函数
// setcookie('key', 'value');

// 只传递一个参数是删除
// 原理：设置过期时间为一个过去时间
setcookie('key');

// 传递两个参数是设置 cookie
setcookie('key1', 'value1');

// 传递第三个参数是设置过期时间
// 不传递就是 会话级别的 Cookie （关闭浏览器就自动删除）
setcookie('key2', 'value2', time() + 1 * 24 * 60 * 60);

setcookie('key3', 'value3', time() + 1 * 24 * 60 * 60, '/users');

setcookie('key4', 'value4', time() + 1 * 24 * 60 * 60, '', '', false, true);
