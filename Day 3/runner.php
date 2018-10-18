<?php

require_once __DIR__ . "/Traveller.php";
require_once __DIR__ . "/Coordinator.php";
require_once __DIR__ . "/CoordinateManifest.php";

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

$santasLocations = $santa -> getLocationsVisited();
$robotsLocations = $robot -> getLocationsVisited();

$manifest = new CoordinateManifest($santasLocations, $robotsLocations);

echo count($manifest -> getUniqueCoordinates());