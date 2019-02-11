<?php

class Bowling
{
    public function score($frames){

        $score = 0;

        foreach ($frames as $index => $frame){

            if(isset($frame[2]) and $index != (count($frames) -1)){
                throw new InvalidArgumentException('There is a frame with three rollins and it\'s not the last one. Are you cheating?');
            }

            if(!isset($frame[0]) or !isset($frame[1])){
                throw new InvalidArgumentException('Frame is not completed. Are you cheating?');
            }

            if($frame[0] + $frame[1] > 10 && !isset($frame[2])){
                throw new InvalidArgumentException('You are hitting more pins than 10. Are you cheating?');
            }

            $is_strike = $frame[0] == 10;
            $is_spare = $frame[0] + $frame[1] == 10;

            if($is_spare or $is_strike){

                if(isset($frames[$index+1])){
                    $next_frame = $frames[$index+1];
                    $first_bonus = $next_frame[0];
                    $score += $frame[0] + $frame[1] + $first_bonus;

                    if($is_strike){
                        $two_next_frame = isset($frames[$index+2]) ? $frames[$index+2] : null;
                        $second_bonus = ($next_frame[0] == 10 and $two_next_frame) ? $two_next_frame[0] : $next_frame[1];
                        $score += $second_bonus;
                    }
                }

            }else{
                $score += $frame[0] + $frame[1];
            }

            if(isset($frame[2]) and $index == (count($frames) -1)){
                $score += $frame[0] + $frame[1] + $frame[2];
            }
        }

        return $score;
    }
}
