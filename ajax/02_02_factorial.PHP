<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php函数二</title>
</head>
<body>
<?php
  function  factorial($n){
    if($n==1){
      return 1;
    }else{
      return $n*factorial($n-1);
    }
  }  
  echo factorial(8);
?><br><br>

<?php
function cal($n){
   if($n>1){
       cal($n-1);
   }else{
       echo "";
   }
   echo $n." ";
}
cal(10);
?><br><br>

<?php
  
?>
</body>
</html>