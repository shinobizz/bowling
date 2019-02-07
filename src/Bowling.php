<?php

class Bowling
{
    public function score($rolls){
        $score = 0;
        $accumulated_points = 0;
        foreach ($rolls as $roll){
            if ($accumulated_points > 0){
                $score += $accumulated_points + $roll[0];
                $accumulated_points = 0;
            }
            if($roll[0] + $roll[1] == 10){
                $accumulated_points = 10;
            }else{
                $score += $roll[0] + $roll[1];
            }
        }

        if ($accumulated_points > 0){
            $score += $accumulated_points;
            $accumulated_points = 0;
        }

        return $score;
    }
}
