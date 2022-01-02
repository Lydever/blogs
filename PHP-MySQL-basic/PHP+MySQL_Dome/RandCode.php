<?php
header("content-type:image/jpeg");
//启动session
session_start();
//创建yige100.30大小的图片
$img = imagecreatetruecolor(100,30);
//设置图片的背景为白色
$bgcolor=imagecolorallocate($img,255,255,255);
//图片填充白色
imagefill($img,0,0,$bgcolor);

//随机数据.包括字母和数字6
$captch_code='';
for($i=0;$i<4;$i++){
    $fontsize=6;
    $fontcolor=imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
    $data='qwertyuiopasdfghjklzxcbnvm1234567890';
    $fontcontent=substr($data,rand(0,strlen($data))-1,1);
    $captch_code.=$fontcontent;
    $x=($i*100/4)+rand(5,10);
    $y=rand(5,10);
    imagestring($img,$fontsize,$x,$y,$fontcontent,$fontcolor);
}

$_SESSION['authcode']=$captch_code;

//随机点,生成干扰点
for($i=0;$i<200;$i++){
    $pointcolor=imagecolorallocate($img,rand(50,120),rand(50,120),rand(50,120));
    imagesetpixel($img,rand(1,99),rand(1,99),$pointcolor);
}

//随机线 生成干扰线
for($i=0;$i<3;$i++){
    $linecolor=imagecolorallocate($img,rand(80,220),rand(80,120),rand(80,220));
    imageline($img,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
    imagejpeg($img);
    imagedestory($img);
}


