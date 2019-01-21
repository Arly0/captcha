<?php
/**
 * Created by PhpStorm.
 * User: NGorbunov
 * Date: 21.01.2019
 * Time: 12:14
 */

include ("generator.php");

$captcha = $_COOKIE["captcha"];
$value = $_POST['text'];

function check_captcha($captcha,$cookie){
    $captcha = trim($captcha);
    $captcha = md5($captcha);

    if($captcha == $cookie)
        return true;
    else
        return false;
}
if(isset($_POST['submit'])) {

    if (isset($value) == '') {
        exit("Enter captcha pls!");
    }

    if (check_captcha($value, $captcha)) {
        echo('Good, u are not robot :) Welcome');
    }
    else {
        exit("Whrong captcha");
    }
}
else{
    exit("OMG, its so bad, get out, hacker!");
}