<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'citizenship_country_id',
        'first_name',
        'last_name',
        'phone_number'
    ];

    public $timestamps = false;

    public function setCitizenshipCountryId(int $citizenshipCountryId): void
    {
        $this->citizenship_country_id = $citizenshipCountryId;
    }

    public function hasCitizenshipCountry(): bool
    {
        return $this->citizenshipCountry !== null;
    }

    public function getCitizenshipCountryName(): ?string
    {
        if (!$this->hasCitizenshipCountry()) {
            return null;
        }

        return $this->citizenshipCountry->name;
    }

    public function setFirstName(string $firstName): void
    {
        $this->first_name = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setLastName(string $lastName): void
    {
        $this->last_name = $lastName;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phone_number = $phoneNumber;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function citizenshipCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
