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
    public function wrongSumOfPinsMustThrowException()
    {
        $rolls = [];
        array_push($rolls, [5,6]);

        $this->expectException(InvalidArgumentException::class);
        $this->sut->score($rolls);
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

    /**
     * @test
     */
    public function getScoreAllOneAndTwoRolls()
    {
        $rolls = [];
        for($i=0;$i<10;$i++){
            array_push($rolls, [1, 2]);
        }
        $this->assertEquals(30, $this->sut->score($rolls));
    }

    /**
     * @test
     */
    public function getScoreOneSpareAndSixRolls()
    {
        $rolls = [
            [7, 3],
            [4, 2],
        ];
        $this->assertEquals(20, $this->sut->score($rolls));
    }

    /**
     * @test
     */
    public function getScoreAllFiveAndSpareRolls()
    {
        $rolls = [];
        for($i=0;$i<10;$i++){
            array_push($rolls, [5, 5]);
        }
        array_push($rolls, [6, 0]);

        $this->assertEquals(151, $this->sut->score($rolls));
    }
}