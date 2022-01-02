<?php 
header('content-type:image/png');
session_start();
$img=imagecreatetruecolor(100,30);
$color=imagecolorallocate($img, 255, 255, 255);
imagefill($img, 255, 255, 255);
$code='';
for($i=0;$i<4;$i++){
	$fontsize=6;
	$fontcolor=imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
	$date='qwertyuiopasdfghjklzxcvbnm1234567890';
	$fontcontent=substr($date,rand(0,strlen($date))-1,1);
	$code.=$fontcontent;
	$x=($i*100/4)+rand(5,10);
	$y=rand(5,10);
	imagestring($img,$fontsize,$x,$y,$fontcontent,$color);
}
$_SESSION['authcode']=$code;
for ($i=0; $i < 200; $i++){ 
	$point=imagecolorallocate($img,rand(50,120),rand(50,120),rand(50,120));
	imagesetpixel($img, rand(1,99), rand(1,99),$point);
}
for ($i=0; $i<3; $i++){ 
	$linecolor=imagecolorallocate($img,rand(80,200),rand(80,200),rand(80,200));
	imageline($img,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
}
imagepng($img);
imagedestroy($img);
 ?>