<?php

function isAlphabetStr($str)
{   $error = '';
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if(empty($str)){
        $error = 'enter all fields';
    }else
    {
        foreach(str_split($str) as $letter){
            if(!str_contains($chars, $letter))
            {
                $error = 'enter only alphabet characters';
                break;
            }
        }
    }

    return $error;
};

function randStr($length){
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomStr = '';
    for($i=0; $i<$length; $i++){
        $randomStr .= $chars[rand(0, strlen($chars)-1)];
    }
    return $randomStr;
}



?>