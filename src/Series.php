<?php

namespace Statista;

use Statista\Contracts\SeriesInterface;

class Series implements SeriesInterface
{
    public function __construct($seed, $messages = [])
    {
        $this->seed = $seed;
        $this->messages = $messages;
    }

    public function generate($length): iterable
    {
        $count = $this->seed;

        $length = $count + $length;
        while ($count < $length) {
            yield $this->process($count);

            $count++;
        }
    }

    private function process($value)
    {
        foreach ($this->messages as $message) {
            if ($message->validate($value)) {
                return $message->message();
            }
        }

        return $value;
    }
}
