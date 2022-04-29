<?php

namespace Statista;

use Statista\Contracts\MessageInterface;

class Message implements MessageInterface
{
    public function __construct(string $message, callable $validator)
    {
        $this->message = $message;

        $this->validator = $validator;
    }

    public function validate(int $value): bool
    {
        return ($this->validator)($value);
    }

    public function message(): string
    {
        return $this->message;
    }
}
