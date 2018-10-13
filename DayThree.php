<?php

$elfInstructions = [];
$coordinatesVisited = [[0,0]];
$currentCoordinate = [0,0];

$fileHandle = fopen("DayThree.txt", "r");

while (!feof($fileHandle)) {
    $nextInstruction = fgetc($fileHandle);
    $elfInstructions[] = $nextInstruction;
}
fclose($fileHandle);

/*
$elfInstructions = trim(file_get_contents("DayThree.txt"));
$elfInstructions = explode("", $elfInstructions);
*/


function getDirectionVector($array, $index)
{
    $character = $array[$index];
    if ($character == "<") {
        return [-1, 0];
    }
    elseif ($character == ">") {
        return [1, 0];
    }
    elseif ($character == "^") {
        return [0, 1];
    }
    elseif ($character == "v"){
        return [0, -1];
    }
    return [0, 0];
}

for ($i = 0; $i < count($elfInstructions)-1; $i++) {

    $directionTravelled = getDirectionVector($elfInstructions, $i);

    $nextXCoordinate = $currentCoordinate[0]+$directionTravelled[0];
    $nextYCoordinate = $currentCoordinate[1]+$directionTravelled[1];
    $nextCoordinate = [$nextXCoordinate, $nextYCoordinate];

    $currentCoordinate = [$nextXCoordinate, $nextYCoordinate];

    print_r($nextCoordinate);

    if (!in_array($coordinatesVisited, $nextCoordinate)){
        $coordinatesVisited[] = $nextCoordinate;
    }

}

for ($i = 0; $i < count($coordinatesVisited); $i++){
    print_r($coordinatesVisited[$i]);
}

echo count($coordinatesVisited);