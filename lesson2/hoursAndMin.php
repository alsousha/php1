<?php

$h = date('h');
$min = date('i');

if((!is_numeric($h)) || (!is_numeric($min)) || ($h > 24) || ($min >60)): 
    echo 'Введен неверный формат времени!';
else :
    if($h > 20) :
        $flag = 'h';
        $wordHours = getArrNum($h, $flag);
    else : 
        $wordHours = getWordHours($h);
    endif;

    if($min > 20) :
        $flag = '';
        $wordMin = getArrNum($min, $flag);
    else : 
        $wordMin = getWordMin($min);
    endif;

    echo "$h $wordHours $min $wordMin";
endif;

function getArrNum($num, $flag)
{
    $arr = str_split($num);
    $num1 = $arr[1];
    return ($flag == 'h') ? getWordHours($num1) : getWordMin($num1);
}

function getWordHours($h)
{
    if($h == 1) return 'час';
    elseif(($h >= 2) && ($h <= 4)) return 'часа';
    else return 'часов';
}

function getWordMin($min)
{
    if($min == 1) return 'минута';
    elseif(($min >= 2) && ($min <= 4)) return 'минуты';
    else return 'минут';
}

?>