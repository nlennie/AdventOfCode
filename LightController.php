<?php

class LightController
{
    private $lights;

    public function __construct()
    {
        $innerArray = [];
        for ($i = 0; $i < 1000; $i++) {
            $innerArray[] = 0;
        }
        $outerArray = [];
        for ($i = 0; $i < 1000; $i++) {
            $outerArray[] = $innerArray;
        }
        $this->lights = $outerArray;
    }

    public function followInstructions($instructions)
    {
        foreach($instructions as $instruction){
            $this->switchLight($instruction);
        }
    }

    public function getLights()
    {
        return $this->lights;
    }

    private function switchLight($instruction)
    {
        for ($i = $instruction["startXCoordinate"]; $i <= $instruction["endXCoordinate"]; $i++) {
            for ($j = $instruction["startYCoordinate"]; $j <= $instruction["endYCoordinate"]; $j++) {
                switch ($instruction["action"]) {
                    case "on":
                        $this->lights[$i][$j] += 1;
                        break;
                    case "off":
                        $this->lights[$i][$j] -= 1;
                        if ($this->lights[$i][$j] < 0){
                            $this->lights[$i][$j] = 0;
                        }
                        break;
                    case "toggle":
                        $this->lights[$i][$j] += 2;
                        break;
                }
            }
        }
    }
}