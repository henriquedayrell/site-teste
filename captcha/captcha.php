<?php
session_start();
ini_set("display_errors", E_ALL);

$captchaCode = substr(md5(mt_rand()), 0, 6);

$_SESSION['captcha_code'] = $captchaCode;
header('Content-type: image/png');
$image = imagecreate(120, 40);  
$backgroundColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 5, 20, 10, $captchaCode, $textColor);

imagepng($image);

imagedestroy($image);
?>

