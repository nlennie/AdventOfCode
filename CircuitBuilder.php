<?php


class CircuitBuilder
{
    private $wires = [];

    private function followInstructions($instructionsAndDestinations)
    {
        $instruction = $instructionsAndDestinations[0];
        $destination = $instructionsAndDestinations[1];

        $this->wires[$destination] = $this->performGate($instruction);
    }

    public function performGate($instructions)
    {
        if (count($instructions) === 3) {
            if ($instructions[1] === "and") {
                return intval($instructions[0]) & intval($instructions[2]);
            } elseif ($instructions[1] === "or") {
                return intval($instructions[0]) | intval($instructions[2]);
            } elseif ($instructions[1] === "lshift") {
                return intval($instructions[0]) << intval($instructions[2]);
            } elseif ($instructions[1] === "rshift") {
                return intval($instructions[0]) >> intval($instructions[2]);
            }
        } elseif (count($instructions) === 2) {
            return intval($instructions[1]);
        } elseif (count($instructions) === 1) {
            return intval($instructions[0]);
        }
    }
}