<?php

declare(strict_types=1);

namespace App\Query\User\FindByStatusAndCitizenship;

use App\Commons\QueryBus\Query;
use App\ValueObject\User\Status;

class FindByStatusAndCitizenship implements Query
{
    private Status $status;
    private int $citizenshipId;

    public function __construct(Status $status, int $citizenshipId)
    {
        $this->status = $status;
        $this->citizenshipId = $citizenshipId;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getCitizenshipId(): int
    {
        return $this->citizenshipId;
    }
}