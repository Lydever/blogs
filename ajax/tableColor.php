<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>隔行换颜色</title>
</head>
<body>
<?php
// $i行数, $j列数, $z隔几行换色
    function tabcolor($i,$j,$k){
         
        //表格开头
        echo '<table width="80" border="1" >';
        //控制tr
        while($i=0){
            $temp=$j;
            if($i%($k+1)==0){
                echo '<tr bgcolor="pink">';
            }else{
                echo '<td>'."第".$i."行".'</td>';
            }
        }
        $i++;
        echo '<tr>';
        $j=$temp;
            //表格结束
        echo '</table>';
    }
   tabcolor(20,4,1);
?>    
</body>
</html>