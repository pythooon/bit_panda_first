<?php

declare(strict_types=1);

namespace App\Contract\User;

use App\ValueObject\Country\Iso;
use App\ValueObject\User\Status;

interface FindUserByStatusAndCitizenCountryContract
{
    public function getIso(): Iso;

    public function getStatus(): Status;
}