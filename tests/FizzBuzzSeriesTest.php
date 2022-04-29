<?php

use PHPUnit\Framework\TestCase;
use Statista\FizzBuzzSeries;

final class FizzBuzzSeriesTest extends TestCase
{
    public function testMaintainsSingletonObject(): void
    {
        $expected = FizzBuzzSeries::getInstance();

        $actual = FizzBuzzSeries::getInstance();

        $this->assertTrue($actual === $expected);
    }

    public function testGeneratesSeriesWithSpecifiedLength(): void
    {
        $fizzbuzz = FizzBuzzSeries::getInstance();

        $this->assertEquals(10, iterator_count($fizzbuzz->generate(10)));
    }

    public function testSeriesInitiatesAtConfiguredSeed(): void
    {
        $fizzbuzz = FizzBuzzSeries::getInstance();

        $fizzbuzz->seed = 7;

        $iterator = $fizzbuzz->generate(1);

        $this->assertEquals([7], iterator_to_array($iterator));
    }

    public function testFizz(): void
    {
        $fizzbuzz = FizzBuzzSeries::getInstance();

        $fizzbuzz->seed = 3;

        $iterator = $fizzbuzz->generate(1);

        $this->assertEquals("Fizz", $iterator->current());
    }

    public function testBuzz(): void
    {
        $fizzbuzz = FizzBuzzSeries::getInstance();

        $fizzbuzz->seed = 5;

        $iterator = $fizzbuzz->generate(1);

        $this->assertEquals("Buzz", $iterator->current());
    }

    public function testFizzBuzz(): void
    {
        $fizzbuzz = FizzBuzzSeries::getInstance();

        $fizzbuzz->seed = 15;

        $iterator = $fizzbuzz->generate(1);

        $this->assertEquals("FizzBuzz", $iterator->current());
    }
}
