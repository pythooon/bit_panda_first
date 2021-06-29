<?php

namespace App\Rules;

use App\ValueObject\User\Status;
use Illuminate\Contracts\Validation\Rule;

class StatusRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        switch ($value) {
            case Status::active()->getValue():
            case Status::notActive()->getValue():
                return true;
            default;
                return false;
        }
    }

    public function message(): string
    {
        return 'Invalid status';
    }
}
