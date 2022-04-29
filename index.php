<?php

require 'vendor/autoload.php';

use Statista\FizzBuzzSeries;

foreach (FizzBuzzSeries::getInstance()->generate(20) as $value)
{
	echo $value . PHP_EOL;
}