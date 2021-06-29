<?php

declare(strict_types=1);

namespace App\Http\Requests\UserDetail;

use App\Contract\UserDetail\EditUserDetailContract;
use Illuminate\Foundation\Http\FormRequest;

class EditUserDetailRequest extends FormRequest implements EditUserDetailContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'citizenship_country_id' => ['required', 'exists:countries,id'],
            'first_name' => ['required', 'min:3', 'max:255'],
            'last_name' => ['required', 'min:3', 'max:255'],
            'phone_number' => ['required', 'min:3', 'max:255'],
        ];
    }

    public function getCitizenshipCountryId(): int
    {
        return (int)$this->get('citizenship_country_id');
    }

    public function getFirstName(): string
    {
        return $this->get('first_name');
    }

    public function getLastName(): string
    {
        return $this->get('last_name');
    }

    public function getPhoneNumber(): string
    {
        return $this->get('phone_number');
    }
}
