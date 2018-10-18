<?php

class Coordinator {
    private $santa;
    private $robot;

    public function __construct(Traveller $travellerA, Traveller $travellerB) {
        $this->santa = $travellerA;
        $this->robot = $travellerB;
    }

    public function coordinate($instructions)
    {
        $travellerToCoordinate = $this->santa;
        foreach ($instructions as $instruction) {
            $travellerToCoordinate->travel($this->getDirectionVector($instruction));
            if ($travellerToCoordinate == $this->santa) {
                $travellerToCoordinate = $this->robot;
            } else {
                $travellerToCoordinate = $this->santa;
            }
        }
    }


    private function getDirectionVector($character) {
        $directions = [
            "^"=>[0,1],
            "v"=>[0,-1],
            ">"=>[1,0],
            "<"=>[-1,0]];
        return $directions[$character];
    }
}