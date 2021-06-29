<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\Repository\Base\BaseRepository;
use App\ValueObject\User\Status;
use Illuminate\Support\Collection;

interface UserRepository extends BaseRepository
{
    public function findByStatusAndCitizenship(Status $status, int $citizenshipId): Collection;
}