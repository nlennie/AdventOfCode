<?php

class Traveller
{
    private $currentLocation = [0,0];
    private $locationsVisited = [[0,0]];

    public function travel($directionVector)
    {
        $nextLocation = [$this->currentLocation[0] + $directionVector[0], $this->currentLocation[1] + $directionVector[1]];
        $this->locationsVisited[] = $nextLocation;
        $this->currentLocation = $nextLocation;
    }

    public function getLocationsVisited(){
        return $this -> locationsVisited;
    }
}