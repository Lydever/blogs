<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
//php隔行输出表格换颜色
    <?php
    function tabcolor(){
      echo '<table border="1" width="80px" align="center">';
      static $i=0;
      while($i<10){
          if($i%1==0){
              if($i%2==0){
                  echo '<tr>';
              }   
          }else{
             echo '<tr bgcolor="blue">';
          }
          $j=1;
          while($j<=1){
            echo '<td bgcolor="green" align="center">'."第".($i*1+$j)."行".'</td>';
            $j++;
   }
   echo '</tr>';
   $i++;
      }
   echo '</table>';
}
$table=tabcolor();
echo $table;
    ?>
</body>
</html>