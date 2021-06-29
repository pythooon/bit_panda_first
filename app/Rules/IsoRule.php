<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsoRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (!preg_match('/^([a-zA-Z]{2,3}|a-zA-Z]{3})$/', $value)) {
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return 'Iso has invalid format.';
    }
}
