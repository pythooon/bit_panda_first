<?php

declare(strict_types=1);

namespace App\ValueObject\Country;

use App\Exceptions\InvalidArgumentException;

class IsoType
{
    const ISO2 = 'iso2';
    const ISO3 = 'iso3';

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function checkIso(string $value): self
    {
        switch (strlen($value)) {
            case 2:
                return self::iso2();
                break;
            case 3:
                return self::iso3();
                break;
            default:
                throw new InvalidArgumentException('Invalid format iso code');
                break;
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private static function iso2(): self
    {
        return new self(self::ISO2);
    }

    private static function iso3(): self
    {
        return new self(self::ISO3);
    }
}