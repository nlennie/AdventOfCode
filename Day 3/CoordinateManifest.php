<?php

class CoordinateManifest
{
    private $allUniqueCoordinates = [];

    public function __construct(array $santasCoordinates, array $robotsCoordinates){
        $allCoordinates = array_merge($santasCoordinates, $robotsCoordinates);
        foreach($allCoordinates as $coordinate){
            if (!in_array($coordinate, $this->allUniqueCoordinates)){
                $this->allUniqueCoordinates[] = $coordinate;
            }
        }
    }

    public function getUniqueCoordinates(){
        return $this->allUniqueCoordinates;
    }


}