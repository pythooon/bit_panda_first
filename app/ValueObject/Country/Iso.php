<?php

declare(strict_types=1);

namespace App\ValueObject\Country;

use App\Exceptions\InvalidArgumentException;

class Iso
{
    private string $value;

    private IsoType $type;

    private function __construct(string $value)
    {
        $this->validate($value);
        $this->type = IsoType::checkIso($value);
        $this->value = $value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getTypeValue(): string
    {
        return $this->type->getValue();
    }

    private function validate(string $value)
    {
        if (!preg_match('/^([a-zA-Z]{2,3}|a-zA-Z]{3})$/', $value)) {
            throw new InvalidArgumentException('Invalid format iso code');
        }
    }
}