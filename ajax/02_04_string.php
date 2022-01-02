  <meta charset="UTF-8">

<?php
//1.
echo "hello,you're the first visitor!";
echo "<br>";
echo "the path is C:\wamp1\www";

//2.(1)
$str = "127.0.0.1";
$arr = explode(".",$str);
var_dump($arr);
echo "<br>";

//2.(2)
$arr1 = array("I","love","Beijing");
$str1 = join(" ",$arr1);
echo $str1;
echo"<br>";
//3.
$str2 = "I am a student!";
//获取$str数组的长度
echo strlen($str2);
echo "<br>";

//分别截取字符串:"am a student.","am a","student"
echo "原字符串为:$str2<br>";
echo "截取字符串后:".substr($str2, 2)."<br>";
echo "截取字符串后:".substr($str2, 2,4)."<br>";
echo "截取字符串后:".substr($str2, 6,8)."<br>";

//查找"student",如果找到输出"查找成功!",否则"查找失败!"
$result = strpos($str2,"student");
if ($result!==false){
	echo "查找成功!"."<br>";
}
else{
	echo "查找失败!";
}
//将"student"替换成"teacher"
echo "原字符串为:$str2<br>";
echo " 替换字符串后:".str_replace("student","teacher",$str2);