<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php函数</title>
</head>
<body>
<?php
function bg($i){
 if($i%2==1){
     $color="blue";
 }else{
     $color="green";
 }
 echo bg($i);
}
?>
<table border="1" cellpadding="1" cellspacing="1" width="70px" align="center">
   <tr><td align="center"><?php  echo "<div>第0行</div>" ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第1行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第2行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第3行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第4行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第5行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第6行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第7行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第8行</div>"  ?></td></tr>
   <tr><td align="center"><?php  echo "<div>第9行</div>"  ?></td></tr>
</table>
</body>
</html>