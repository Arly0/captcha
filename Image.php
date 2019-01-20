<?php
/**
 * Created by PhpStorm.
 * User: NGorbunov
 * Date: 20.01.2019
 * Time: 11:26
 */

define ('DECUMENT_ROOT', dirname(__FILE__)); // подключение к папке проекта
define ("img_dir", DECUMENT_ROOT.'/img'); // вход в папку с изображениями фона
define ("font_dir", DECUMENT_ROOT.'/font'); // вход в папку с шрифтами

include ("generator.php");

header ("Content-type: image/png"); // передаем HTTP протоколу, что мы будем вызывать пикчу

$captcha = generator_captcha();

function img_generate($code){ // code - captcha
    $fontArr = array(
        11 => "MAGNETOB.TTF",
        12 => "LHANDW.TTF",
        13 => "Lazer84.ttf",
        14 => "BRUSHSCI.TTF"
    );
    $backArr = array(

    );

    $im = imagecreatefrompng(img_dir.$backArr[rand(0,sizeof($backArr) - 1)]);


    for ($i=0;$i<strlen($code);$i++)
    {
        $size = rand(20,30);

    }
}