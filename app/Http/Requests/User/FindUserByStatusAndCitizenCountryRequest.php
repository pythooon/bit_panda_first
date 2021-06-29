<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Contract\User\FindUserByStatusAndCitizenCountryContract;
use App\Rules\IsoRule;
use App\Rules\StatusRule;
use App\ValueObject\Country\Iso;
use App\ValueObject\User\Status;
use Illuminate\Foundation\Http\FormRequest;

class FindUserByStatusAndCitizenCountryRequest extends FormRequest implements FindUserByStatusAndCitizenCountryContract
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'iso' => ['required', new IsoRule()],
            'status' => ['required', new StatusRule(), 'integer']
        ];
    }

    public function getIso(): Iso
    {
        return Iso::fromString(mb_strtoupper($this->get('iso')));
    }

    public function getStatus(): Status
    {
        if ($this->get('status') === 0) {
            return Status::notActive();
        }
        return Status::active();
    }
}
