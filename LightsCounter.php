<?php


class LightsCounter
{
    public function countLights($lights, $state){
        $count = 0;
        for ($i=0; $i<1000;$i++){
            for($j=0; $j<1000; $j++){
                $count += $lights[$i][$j];
            }
        }
        return $count;
    }
}