<?php

class BowlingTest extends \PHPUnit\Framework\TestCase
{
    protected $sut;

    protected function setUp(): void
    {
        $this->sut = new Bowling();
    }

    /**
     * @test
     */
    public function getScoreAllZeroRoll()
    {
        $rolls = [];
        for($i=0;$i<10;$i++){
            array_push($rolls, [0,0]);
        }
        $this->assertEquals($this->sut->score($rolls), 0);
    }

}