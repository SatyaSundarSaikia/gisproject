<?php
session_start();
$code=rand(1000,9999);
$_SESSION["packcode"]=$code;
$im = imagecreatetruecolor(60, 30);
$bg = imagecolorallocate($im, 24, 51,86);
$fg = imagecolorallocate($im, 255, 255, 255);
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 10, 7,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>