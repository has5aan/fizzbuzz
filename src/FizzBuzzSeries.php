<?php

namespace Statista;

use Statista\Message;
use Statista\Series;

class FizzBuzzSeries
{
    private static ?Series $instance = null;

    public static function getInstance(): Series
    {
        if (isset(self::$instance)) {
            return self::$instance;
        }

        $fizz = new Message("Fizz", function ($value) {
            return $value % 3 == 0;
        });

        $buzz = new Message("Buzz", function ($value) {
            return $value % 5 == 0;
        });

        $fizzbuzz = new Message("FizzBuzz", function ($value) use ($fizz, $buzz) {
            return $fizz->validate($value) && $buzz->validate($value);
        });

        self::$instance = new Series(1, [$fizzbuzz, $fizz, $buzz]);

        return self::$instance;
    }
}
