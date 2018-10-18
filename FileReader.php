<?php

class FileReader
{
    public function readInstructions($fileName){
        $fileHandle = fopen($fileName, "r");
        $instructions = [];

        while (!feof($fileHandle))
        {
            $nextInstruction = fgets($fileHandle);
            $instructions[] = $nextInstruction;
        }

        fclose($fileHandle);

        return $instructions;
    }
}