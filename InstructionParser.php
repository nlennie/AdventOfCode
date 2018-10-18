<?php

class InstructionParser
{
    public function parseAllInstructions($instructionsToParse){
        $parsedInstructions = [];
        foreach ($instructionsToParse as $instruction){
            $parsedInstructions[] = $this->parseInstruction($instruction);
        }
        return $parsedInstructions;
    }

    private function parseInstruction($instructionToParse)
    {
        preg_match_all("/(\w+\s+)(\d+),(\d+) through (\d+),(\d+)/", $instructionToParse, $matches);
        return [
            "action" => trim($matches[1][0]),
            "startXCoordinate" => $matches[2][0],
            "endXCoordinate" => $matches[4][0],
            "startYCoordinate" => $matches[3][0],
            "endYCoordinate" => $matches[5][0]
        ];
    }
}