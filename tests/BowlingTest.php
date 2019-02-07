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
    public function getScoreAllZeroRolls()
    {
        $rolls = [];
        for($i=0;$i<10;$i++){
            array_push($rolls, [0,0]);
        }
        $this->assertEquals(0, $this->sut->score($rolls));
    }

    /**
     * @test
     */
    public function getScoreAllFiveAndMissRolls()
    {
        $rolls = [];
        for($i=0;$i<10;$i++){
            array_push($rolls, [5,0]);
        }
        $this->assertEquals(50, $this->sut->score($rolls));
    }

}