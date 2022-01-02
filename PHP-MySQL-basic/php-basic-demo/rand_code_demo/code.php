<?php 
ob_clean();
header("Content-type:image/jpeg");
$width = 80;
$height = 30;
$str = Array();
$string = 'asdfghjklzxcvbnmqwertyuiop1234567890';
$vcode='';
for($i=0;$i<4;$i++){
	$str[$i] = $string[rand(0,35)];
	$vcode.=$str[$i];
}
session_start();
$_SESSION['vcode']=$vcode;
$im=imagecreatetruecolor($width,$height);
$white=imagecolorallocate($im,255,255,255);
$black=imagecolorallocate($im,0,0,0);
imagefilledrectangle($im,0,0,$width,$height,$white);
imagerectangle($im,0,0,$width-1,$height-1,$black);
for($i=1;$i<200;$i++){
	$x=mt_rand(1,$width-9);
	$y=mt_rand(1,$height-9);
	$color=@imagecolorallocate($im,mt_rang(200,255),mt_rand(200,255),mt_rand(200,255));
	imagechar($im,1,$x,$y,"*",$color);
}
for($i=0;$i<count($str);$i++){
	$x=13+$i*($width-15)/4;
	$y=mt_rand(3,$height/3);
	$color=imagecolorallocate($im,mt_rand(0,255),mt_rand(0,150),mt_rand(0,255));
	imagechar($im,5,$width,$height,$str[$i],$color);
}
imagejpeg($im);
imagedestroy($im);
 ?>