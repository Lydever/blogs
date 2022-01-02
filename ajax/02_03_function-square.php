<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php三角形</title>
</head>
<body>
    <?php
//1.打印三角形
       function tir($n){
          for($i=0;$i<=$n;$i++){//行数
              for($j=1;$j<=$i;$j++){//列数
                  echo "*";
                  echo "&nbsp &nbsp";
              }
              echo "<br>";
          }
       }
       echo tir(9);//调用函数
    ?><br><br>

    <?php
      //打印正方形
      function square($n){
          for($i=0;$i<$n;$i++){
              for($j=$n;$j>0;$j--){
                  echo "*"."&nbsp&nbsp";
              }
              echo "<br>";
          }
      }
      echo square(16);//调用函数
    ?><br><br><br><br>




    <?php
    //3.打印金字塔
      function jzta($n){
        for($i=1;$i<=$n;$i++){
            for($j=1;$j<=$n-$i;$j++){
                echo "&nbsp";
            }
            for($k=1;$k<=($i-1)*2+1;$k++){
                echo "*";
            }
            echo "<br>";
        }
      }
      echo jzta(5);//调用函数
    ?><br><br>
    
    
    
    
    
    
    
    <?php
    //4.九九乘法表/九九加发表
       function jjcfa($n){
           //乘法表
           echo '<table width="600" border="1" >';
           for($i=1;$i<$n;$i++){
               echo '<tr>';
             for($j=1;$j<=$i;$j++){
                 echo '<td align="center">'.$i.'X'.$j.'='.($i*$j).'</td>';
             }
             echo '<br>'.'</tr>';
           }
           echo '</table>';
            //加法表
           echo '<table width="600" border="1" >';
           for($i=1;$i<$n;$i++){
               echo '<tr>';
             for($j=1;$j<=$i;$j++){
                 echo '<td align="center">'.$i.'+'.$j.'='.($i+$j).'</td>';
             }
             echo '<br>'.'</tr>';
           }
           echo '</table>';
       }
       echo jjcfa(9);//调用函数
    ?>
    

</body>
</html>
