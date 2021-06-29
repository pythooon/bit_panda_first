<?php

declare(strict_types=1);

namespace App\Contract\UserDetail;

interface EditUserDetailContract
{
    public function getCitizenshipCountryId(): int;
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getPhoneNumber(): string;
}