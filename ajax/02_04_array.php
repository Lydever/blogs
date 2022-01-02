<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>循环数组</title>
</head>
<body>
<?php
// 1、创建数组$arr1， 代码为: Sarr 1= array("张 三","男",20,"广州");使用for()循环
 // 遍历数组$arr1。
      $arr1 = array("张三","男",20,"广州");
      for($i=0;$i<count($arr1);$i++){
         $str=$arr1[$i];
         echo $str;
      }
    ?><br>

<?php
// 2、创建数组$arr2，代码为: $arr2 = array("姓 名"=>"张三","性别"=>"男","年龄"=>20,
// "所在地"=>"广州");使用foreach()循环的两种用法(PPTP19、P20)分别遍历数组。
//foreach 第一种方法输出
$arr2 = array("姓名"=>"张三","性别"=>"男","年龄"=>20,"所在地"=>"广州");
   echo "输出arr2所有键名和元素值:"."<br>";
   foreach($arr2 as $value){
   echo $value."&nbsp &nbsp;";
   }
   echo "<br>";

//foreach 第二种方法输出  
$arr2 = array("姓名"=>"张三","性别"=>"男","年龄"=>20,"所在地"=>"广州");
  echo "输出arr2所有键名和元素值:"."<br>";
  foreach($arr2 as $key=>$value){
  echo $key."=>".$value."&nbsp,&nbsp";
}
?><br><br>

<?php
//3、
   $student = array
     (
     "202001"=>array(
           "name"=>"张三",
           "sex"=>"男",
           "age"=>20),
     "202002"=>array(
          "name"=>"李四",
          "sex"=>"女",
          "age"=>19),
     "202003"=>array(
         "name"=>"王五",
         "sex"=>"男",
         "age"=>21)          
     );
          echo print_r($student);   
?><br>
<?php
//4、将$student 进行遍历，并在页面上以表格形式输出
$student = array(
 array("姓名","性别","年龄"),
 array("张三","男",20),
 array("李四","女",19),
 array("王五","男",21)
);

  echo '<table border="1" align="center" width="500">';
  for($i=0;$i<count($student);$i++){
      echo '<tr>';
      for($j=0;$j<count($student[$i]);$j++){
          echo '<td align="center">'.$student[$i][$j].'</td>';
      }   
          echo '</tr>';
  }
   echo '</table>';
   
?>
</body>
</html>