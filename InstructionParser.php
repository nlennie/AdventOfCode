<?php

class InstructionParser
{
    private $explodedInstructions = [];

    public function getExplodedInstructions(){
        return $this->explodedInstructions;
    }

    public function parseAllInstructions($instructionsToParse){
        foreach($instructionsToParse as $instruction){
            $this->explodedInstructions[] = $this->separateInstructionsAndDestinations($instruction);
        }
    }

    private function separateInstructionsAndDestinations($instructionToParse)
    {
        $instructionDirection = explode(" -> ", $instructionToParse);
        $instructionDirection[0] = explode(" ", $instructionDirection[0]);
        return $instructionDirection;
    }
}