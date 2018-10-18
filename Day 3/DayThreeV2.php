<?php

$elfInstructions = readCharactersToArray("DayThreeFull.txt");

#$listOfUniqueCoordinates = getUniqueCoordinatesVisited([0,0], $elfInstructions);
#echo count($listOfUniqueCoordinates);

$santaInstructions = getInstructionsWithEvenIndex($elfInstructions);
$robotInstructions = getInstructionsWithOddIndex($elfInstructions);

$santasListOfUniqueCoordinates = getUniqueCoordinatesVisited([0, 0], $santaInstructions);
$robotsListOfUniqueCoordinates = getUniqueCoordinatesVisited([0, 0], $robotInstructions);
$fullListOfCoordinates = $santasListOfUniqueCoordinates;

for ($i = 0; $i < count($robotsListOfUniqueCoordinates); $i++) {
    if (!in_array($robotsListOfUniqueCoordinates[$i], $fullListOfCoordinates)) {
        $fullListOfCoordinates[] = $robotsListOfUniqueCoordinates[$i];
    }
}

function readCharactersToArray($fileName)
{
    $fileHandle = fopen($fileName, "r");
    $instructions = [];
    while (!feof($fileHandle)) {
        $nextInstruction = fgetc($fileHandle);
        $instructions[] = $nextInstruction;
    }
    fclose($fileHandle);
    return $instructions;
}

function getDirectionVector($array, $index)
{
    $character = $array[$index];
    if ($character == "<") {
        return [-1, 0];
    } elseif ($character == ">") {
        return [1, 0];
    } elseif ($character == "^") {
        return [0, 1];
    } elseif ($character == "v") {
        return [0, -1];
    }
    return [0, 0];
}

function getNextCoordinate($currentCoordinate, $directionVector)
{
    $nextCoordinate = [$currentCoordinate[0] + $directionVector[0], $currentCoordinate[1] + $directionVector[1]];
    return $nextCoordinate;
}

function getUniqueCoordinatesVisited($startingPoint, $instructionsArray)
{
    $uniqueCoordinatesVisited = [[$startingPoint]];
    $currentCoordinate = $startingPoint;
    for ($i = 0; $i < count($instructionsArray); $i++) {
        $nextCoordinate = getNextCoordinate($currentCoordinate, getDirectionVector($instructionsArray, $i));
        if (!in_array($nextCoordinate, $uniqueCoordinatesVisited)) {
            $uniqueCoordinatesVisited[] = $nextCoordinate;
        }
        $currentCoordinate = $nextCoordinate;
    }
    return $uniqueCoordinatesVisited;
}

function getInstructionsWithEvenIndex($arrayToSplit)
{
    $instructions = [];
    for ($i = 0; $i < count($arrayToSplit); $i += 2) {
        $instructions[] = $arrayToSplit[$i];
    }
    return $instructions;
}

function getInstructionsWithOddIndex($arrayToSplit)
{
    $instructions = [];
    for ($i = 1; $i < count($arrayToSplit); $i += 2) {
        $instructions[] = $arrayToSplit[$i];
    }
    return $instructions;
}

