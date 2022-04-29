<?php

namespace Statista\Contracts;

interface SeriesInterface
{
    public function generate($length): iterable;
}
