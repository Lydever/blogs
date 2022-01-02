<?php 
header('Content-Type:image/png');

$im = imagecreatetruecolor(200,200);
$blue = imagecolorallocate($im,0,128,255);
imagefill($im,0,0,$blue);
$white = imagecolorallocate($im,255,255,255);
imageline($im, 0, 0, 200,200, $white);
imageline($im, 0, 200, 200,0, $white);
imagestring($im, 5, 90,50,'PHP', $white);
imagefilledellipse($im,100,100,20,20,$white);
imagepng($im);
 imagedestroy($im);
 ?>