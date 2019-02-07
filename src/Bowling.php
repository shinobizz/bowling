<?php

class Bowling
{
    public function score($frames){

        $score = 0;

        foreach ($frames as $index => $frame){

            if($frame[0] + $frame[1] > 10){
                throw new InvalidArgumentException('Only positive integers greater than 0');
            }

            $is_strike = $frame[0] == 10;
            $is_spare = $frame[0] + $frame[1] == 10;

            if($is_strike) {
                // TODO
            }elseif($is_spare){
                if(isset($frames[$index+1])){
                    $next_frame = $frames[$index+1];
                    $score += 10 + $next_frame[0];
                }elseif(isset($frame[2])){
                    $score += 10 + $frame[2];
                }
            }else{
                $score += $frame[0] + $frame[1];
            }
        }

        return $score;
    }
}
