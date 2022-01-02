<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php数组</title>
</head>
<body>
    <?php
    //一维数组
      //  $cars1 = array("Volvo","BMW","SAAB");
      //  $cars2[0] = "大众";
      //  $cars2[1] = "丰田";
      //  $cars2[2] = "起亚";
      //  echo "I like".$cars1[0].",".$cars1[1].",".$cars1[2]."."."<br>";
      //  echo "打印数组键和值如下:<br>";
      //  print_r($cars2);
      //  echo "<br>";
    ?><br>
    <?php
    //1.
    //     $p1 = array("张三","男",20);
    //     print_r($p1);

    //     $p2[] = "张三";
    //     $p2[] = "男";
    //     $p2[] = 20;
    //     echo "<br>";
    //     print_r($p2);
    //     echo "<br>";
    // ?><br>

    <?php
    //2.
        // $p1 = array("name"=>"张三","sex"=>"男","age"=>20);
        // print_r($p1);

        // $p2["name"] = "张三";
        // $p2["sex"] = "男";
        // $p2["age"] = 20;
        // print_r($p2);
        // echo "<br>";
    ?><br>

     <?php
    //3.
        $student = array
        (
          "202001"=>array("name"=>"张三","sex"=>"男","age"=>20),
          "202002"=>array("name"=>"李四","sex"=>"女","age"=>19),
          "202003"=>array("name"=>"王五","sex"=>"男","age"=>21)          
        );
        echo print_r($student); 

    ?>

    <?php
    // //二维数组
    //   $str = array(
    //       "办公应用"=>array("Word","Excel","Powerpoint"),
    //       "平面设计"=>array("m"=>"Photoshop","n"=>"CorelDRAW","o"=>"IIlustrator"),
    //       "web开发"=>array("php",8=>"ASP.NET","JSP")
    //   );
    //   print_r($str);
    // ?><br>
     <?php
    //    //数组的遍历 foreach
    //    $a = array(1,2,3,6);
    //    $b = array("one"=>"1","two"=>"2","three"=>"3","six"=>"6");
    //    echo "输出数组a所有元素:"."<br>";
    //    foreach ($a as $value){
    //      echo $value."&nbsp;";
    //    }
    //    echo "<hr>";
    //    echo "输出数组b所有键名和元素值:"."<br>";
    //    foreach ($b as $key=>$value){
    //        echo $key."=>".$value."&nbsp;";
    //    }
    // ?>

 
</body>
</html>