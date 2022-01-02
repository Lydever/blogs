  <meta charset="UTF-8">

<?php
//1. 编程实现以下功能：字符串“i am a student”转换成“I Am A
//   Student”；“this is an apple”转换成“This Is An Apple”

$myString = 'i am a student';
echo '原字符串为:'.$myString.'<br>';
echo '转换后:'.ucwords($myString).'<br>';

//编程实现
$newstr = explode(' ', $myString);//把字符串分割成新的数组
echo '转换后:';
foreach ($newstr as $value) {//遍历循环将每个单词手写字母变成大写
echo ucwords($value).'&nbsp';	
}
echo '<br>';



// 2. 编程实现字符串的翻转
//一.直接使用函数
$str = 'Holle World';
echo '原字符串为:'.$str;
echo '翻转后:'.strrev($str);
echo '<br>';
//二.编程实现
$newStr = '';
for($i=strlen($str);$i>=0;$i--){
	$newStr .=$str[$i];
}
echo $newStr;
echo '<br>';



//3. 编写程序，取文件名的后缀（例如：C:\wamp1\www\index.php 得
//到.php）
$str1 = 'C:\wamp1\www\index.php';
$newstr1 = mb_substr($str1,18);
echo '截取的后缀名为:'.'&nbsp &nbsp'.$newstr1;
echo '<br>'


//4. 编 写程序 ， 从 URL 中 得 到 文 件 名 （ 例 如 ：
//"http://localhost:8080/index.php"得到 index.php）
$str2 = 'http://localhost:8080/index.php';
$newstr2 = mb_substr($str2,22);
echo '截取的文件名为:'.$newstr2;