<?php

namespace Statista\Contracts;

interface MessageInterface
{
    public function validate(int $value): bool;

    public function message(): string;
}
