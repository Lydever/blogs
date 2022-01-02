<?php 
header('Content-Type:image/png');

$img = imagecreatetruecolor(200,200);
$blue = imagecolorallocate($im,0,128,255);
imagefill($img,0,0,$blue);
$white = imagecolorallocate($img,255,255,255);
imageline($img, 0, 0, 200,200, $white);
imageline($img, 0, 200, 200,0, $white);
imagestring($img, 5, 90,50,'PHP', $white);
imagefilledellipse($img,100,100,20,20,$white);
imagepng($img);
// imagedestroy($im);

 ?>