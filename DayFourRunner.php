<?php

$i = 1;

$foundKey = false;
$keyNumber = -1;

while (!$foundKey){
    $testKey = "iwrupvqb".$i;
    if(checkFiveLeadingZeroes($testKey) == true){
        $foundKey = true;
        $keyNumber = $i;
    }
    $i++;
}

echo $keyNumber;

function checkFiveLeadingZeroes($key){
    $hash = MD5($key);
    if(substr($hash, 0, 5)==="00000"){
        return true;
    }
    return false;
}
