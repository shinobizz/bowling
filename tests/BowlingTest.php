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
        for($i=0;$i<9;$i++){
            array_push($rolls, [5, 5]);
        }
        array_push($rolls, [5, 5, 6]);

        $this->assertEquals(151, $this->sut->score($rolls));
    }

    /**
     * @test
     */
    public function getScoreAllStrikes()
    {
        $rolls = [];
        for($i=0;$i<9;$i++){
            array_push($rolls, [10, 0]);
        }
        array_push($rolls, [10, 10, 10]);

        $this->assertEquals(300, $this->sut->score($rolls));
    }

    /**
     * @test
     */
    public function checkInvalidFramesWithThreeRollsIfNotLastFrame()
    {
        $rolls = [];
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5, 5]);
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5]);
        array_push($rolls, [5, 5, 5]);

        $this->expectException(InvalidArgumentException::class);
        $this->sut->score($rolls);
    }

    /**
     * @test
     */
    public function checkComplexGame()
    {
        $rolls = [];
        array_push($rolls, [3, 2]);
        array_push($rolls, [7, 3]);
        array_push($rolls, [10, 0]);
        array_push($rolls, [3, 4]);
        array_push($rolls, [5, 2]);
        array_push($rolls, [9, 0]);
        array_push($rolls, [1, 4]);
        array_push($rolls, [4, 2]);
        array_push($rolls, [8, 1]);
        array_push($rolls, [3, 7, 2]);

        $this->assertEquals(97, $this->sut->score($rolls));
    }

    /**
     * @test
     */
    public function checkUncompletedFrame()
    {
        $rolls = [];
        array_push($rolls, [3, ]);

        $this->expectException(InvalidArgumentException::class);
        $this->sut->score($rolls);
    }
}