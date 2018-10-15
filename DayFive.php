<?php

$allStrings = [];
$niceStrings = [];
$naughtyStrings = [];

$fileHandle = fopen("DayFour.txt", "r");
while (!feof($fileHandle)) {
    $nextString = fget($fileHandle);
    $allStrings[] = $nextString;
}
fclose($fileHandle);

for ($allStrings as $aString){
    if(hasAtLeastThreeVowels($aString) && hasDoubleLetter($aString) && !containsForbiddenSubstring($aString)){
        $niceStrings[] = $aString;
    }
    else{
        $naughtyStrings[] = $aString;
    }
}

echo count($niceStrings);

function hasAtLeastThreeVowels($text){
    $vowels = [];
    for ($i = 0; $i<strlen($text); $i++){
        if (in_array($text[$i], ["a","e","i","o","u"])){
            $vowels[] = $text[$i];
        }
    }
    if(count($vowels)>=3){
        return true;
    }
    return false;
}

function hasDoubleLetter($text){
    for ($i=1; $i<strlen($text); $i++){
        if($text[$i-1] = $text[$i]){
            return true;
        }
    }
    return false;
}

function containsForbiddenSubstring($text){
    for ($i=1; $i<strlen($text); $i++){
        if(in_array(substr($text, $i-1, 2), ["ab", "cd", "pq", "xy"])){
            return true;
        }
    }
    return false;
}
