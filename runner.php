<?php


$fileHandle = fopen("DayThreeFull.txt", "r");
$instructions = [];
while (!feof($fileHandle)) {
    $nextInstruction = fgetc($fileHandle);
    $instructions[] = $nextInstruction;
}
fclose($fileHandle);

$santa = new Traveller();
$robot = new Traveller();

$coordinator = new Coordinator($santa, $robot);

$coordinator -> coordinate($instructions);


$manifest = new CoordinateManifest($santa -> $locationsVisited, $robot -> $locationsVisited);

echo count($manifest);