<?php

declare(strict_types=1);

namespace App\ValueObject\User;

class Status
{
    const NOT_ACTIVE = 0;
    const ACTIVE = 1;
    private int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function notActive(): self
    {
        return new self(self::NOT_ACTIVE);
    }

    public static function active(): self
    {
        return new self(self::ACTIVE);
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
