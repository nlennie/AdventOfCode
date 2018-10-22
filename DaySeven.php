<?php

include_once __DIR__ . "/InstructionParser.php";
include_once __DIR__ . "/FileReader.php";
include_once __DIR__ . "/CircuitBuilder.php";

$fileReader = new FileReader();
$instructionParser = new InstructionParser();
$circuitBuilder = new CircuitBuilder();

$unparsedInstructions = $fileReader->readFile("DaySevenTest.txt");

$instructionParser->parseAllInstructions($unparsedInstructions);
$instructions = $instructionParser->getExplodedInstructions();

#print_r($instructions);
/*
echo $circuitBuilder->performGate(["123", "and", "456"]);
echo "\n";
echo $circuitBuilder->performGate(["123", "or", "456"]);
echo "\n";
echo $circuitBuilder->performGate(["123", "lshift", "2"]);
echo "\n";
echo $circuitBuilder->performGate(["456", "rshift", "2"]);
echo "\n";
echo $circuitBuilder->performGate(["not", "123"]);
echo "\n";
echo $circuitBuilder->performGate(["not", "456"]);
echo "\n";*/

$x = 123;
$y = 456;


echo ~$x;
echo "\n";
echo ~$y;