<?php

$inputArray = [];
$fileName = "Input.txt";

$dimensions = [];

$fileHandle = fopen($fileName, "r");

while (!feof($fileHandle)) {
    $newLine = fgets($fileHandle);
    $inputArray[] = $newLine;
}
fclose($fileHandle);


for($i=0; $i<count($inputArray); $i++){
    $element = explode("x", $inputArray[$i]);
    $dimensions[] = $element;
}


$totalAmountOfPaperRequired = 0;

for($i = 0; $i<count($dimensions); $i++){
    $parcel = $dimensions[$i];
    $frontArea = $parcel[0]*$parcel[1];
    $sideArea = $parcel[0]*$parcel[2];
    $topArea = $parcel[1]*$parcel[2];

    $paperRequiredForParcel = 2*($frontArea + $sideArea + $topArea)+min($frontArea,$sideArea,$topArea);
    $totalAmountOfPaperRequired += $paperRequiredForParcel;
}

#echo $totalAmountOfPaperRequired;

$totalAmountOfRibbonRequired = 0;

for($i = 0; $i<count($dimensions); $i++){
    $parcel = $dimensions[$i];
    $frontPerimeter = 2*($parcel[0]+$parcel[1]);
    $sidePerimeter = 2*($parcel[0]+$parcel[2]);
    $topPerimeter = 2*($parcel[1]+$parcel[2]);
    $volume = $parcel[0]*$parcel[1]*$parcel[2];

    $ribbonRequiredForParcel = min($frontPerimeter,$sidePerimeter,$topPerimeter)+$volume;
    $totalAmountOfRibbonRequired += $ribbonRequiredForParcel;
}

echo $totalAmountOfRibbonRequired;








function printArray($array){
    for ($i = 0; $i < count($array); $i++){
        echo $array[$i];
    }
}


#$dimensions = explode("x", "2x3x4");
#printArray($dimensions);

#echo strpos("2x3x4", "x");
#echo " and ";
#echo strrpos("2x3x4", "x");
#echo " and ";
#echo substr("2x3x4", 1, 3);