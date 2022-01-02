  <meta charset="UTF-8">

<?php


//2.实训二
$student = array("王丹"=>67,"李明"=>83,"王华"=>75,"张强"=>96,"朱芳"=>89);
arsort($student);
foreach($student as $key=>$value){
	echo "[$key]"."=>"."$value";
}
echo "<br>";
echo "$key"."的成绩为:"."$value";
//输出排序成绩表
echo "<br>";
 	echo '<table border="1" cellspacing="0" width="200" >';
 	echo '<th>'.'姓名'.'</th>';
 	echo '<th>'.'成绩'.'</th>';
 foreach($student as $key=>$value){
    echo '<tr>';
 	echo '<td align="center" >'.$key.'</td>'.'<td align="center">'.$value.'</td>'.'<br>';
 	echo '</tr>';

 }
 	echo '</table>';