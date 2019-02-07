<?php

class Bowling
{
    public function score($frames){

        $score = 0;
        $accumulated_score = 0;

        foreach ($frames as $index => $frame){

            if($frame[0] + $frame[1] > 10){
                throw new InvalidArgumentException('Only positive integers greater than 0');
            }

            $is_strike = $frame[0] == 10;
            $is_spare = $frame[0] + $frame[1] == 10;

            if($is_strike) {
                // TODO
            }elseif($is_spare){
                $next_frame = $frames[$index+1];
                $accumulated_score = 10 + $next_frame[0];
            }else{
                $score += $accumulated_score;
                $accumulated_score = 0;
                $score += $frame[0] + $frame[1];
            }
        }

        return $score;
    }
}
