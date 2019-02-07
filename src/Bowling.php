<?php

class Bowling
{
    public function score($rolls){
        $score = 0;
        foreach ($rolls as $roll){
            $score += $roll[0];
        }
        return $score;
    }
}
