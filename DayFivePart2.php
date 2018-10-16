<?php

$allStrings = [];
$niceStrings = [];

$fileHandle = fopen("DayFiveTest.txt", "r");
while (!feof($fileHandle)) {
    $nextString = fgets($fileHandle);
    $allStrings[] = $nextString;
}
fclose($fileHandle);

foreach ($allStrings as $aString){
    if(hasNonOverlappingRepeatedPair($aString)&&hasAlternatePair(($aString))){
        $niceStrings[] = $aString;
    }
    else{
        $naughtyStrings[] = $aString;
    }
}

echo count($niceStrings);

function hasAlternatePair($text){
    for ($i = 2; $i<strlen($text); $i++){
        if ($text[$i-2] === $text[$i]){
            return true;
        }
    }
    return false;
}

function hasNonOverlappingRepeatedPair($text){
    $pairs = [];
    for ($i=1; $i<strlen($text); $i++){
        $pair = $text[$i-1].$text[$i];
        if(end($pairs)!=$pair) {
            $pairs[] = $pair;
        }
    }
    if(count(array_unique($pairs))<count($pairs)){
        return true;
    }
    return false;
}
