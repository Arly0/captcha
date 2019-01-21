<?php
/**
 * Created by PhpStorm.
 * User: NGorbunov
 * Date: 20.01.2019
 * Time: 11:26
 */
define ("img_dir", "C:\Users\NGorbunov\Desktop\openServer\OSPanel\domains\localhost\captcha\img"); // вход в папку с изображениями фона
define ("font_dir", "C:\Windows\Fonts"); // вход в папку с шрифтами

//echo "<script type='text/javascript'>alert('Hi');</script>";
include ("generator.php");

header ("Content-type: image/png"); // передаем HTTP протоколу, что мы будем вызывать пикчу

$captcha = generator_captcha();
img_generate($captcha);

$cookie = md5($captcha);
$cookieTime = time() + 120;
setcookie($cookie, $cookieTime);

function img_generate($code){ // code - captcha
    $fontArr = array(
        11 => "\Arial.ttf",
        12 => "\Chiller.ttf",
        13 => "\Gabriola.ttf",
    );
    $backArr = array(
        11 => "\image1.png",
        12 => "\image2.png",
        13 => "\image3.png",
    );

    $lineum = rand(4,7);
    $code = strtoupper($code);
    $r = rand(11,13);
    $im = imagecreatefrompng(img_dir.$backArr[$r]);
    $codeArr = str_split($code);
    $x = 0;

    for ($i=0;$i<strlen($code);$i++)
    {
        $x += rand(15,25);
        $size = rand(20,30);
        $color = imagecolorallocate($im, rand(100,255), rand(100,255), rand(100,255));
        imagettftext($im, $size, rand(2,4), $x, rand(40,50), $color, font_dir.$fontArr[$r], $codeArr[$i]);
    }
    for ($i=0;$i<$lineum;$i++)
    {
        $x = rand(1,149);
        $y = rand(1,69);
        $x1 = rand(1,149);
        $y1 = rand(1,69);
        $color = imagecolorallocate($im, rand(100,255), rand(100,255), rand(100,255));
        imageline($im, $x, $y, $x1, $y1, $color);
    }

    imagepng($im);
    imagedestroy($im);
}