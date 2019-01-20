<?php
/**
 * Created by PhpStorm.
 * User: NGorbunov
 * Date: 20.01.2019
 * Time: 11:14
 */

function generator_captcha(){
    $symbol = 'qwertyupkjhgfdsazxcvbnm23456789';
    $len = rand(4,6);
    $lenSymbol = strlen($symbol);
    $chars = '';
    $symbol_arr = str_split($symbol);

    for($i=0;$i<$len;$i++)
    {
        $chars .= $symbol_arr[rand(1,$lenSymbol)];
    }
    return $chars;
}