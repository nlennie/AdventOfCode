<?php

require_once __DIR__ . "/LightController.php";
require_once __DIR__ . "/InstructionParser.php";
require_once __DIR__ . "/FileReader.php";
require_once __DIR__ . "/LightsCounter.php";

$lightsController = new LightController();
$instructionParser = new InstructionParser();
$fileReader = new FileReader();
$lightCounter = new LightsCounter();

$instructionsToParse = $fileReader->readInstructions("DaySix.txt");

$parsedInstructions = $instructionParser->parseAllInstructions($instructionsToParse);

$lightsController->followInstructions($parsedInstructions);

echo $lightCounter->countLights($lightsController->getLights(), 1);