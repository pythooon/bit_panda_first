<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\Models\User;
use App\Repository\Base\BaseRepositoryImpl;
use App\ValueObject\User\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class UserRepositoryImpl extends BaseRepositoryImpl implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByStatusAndCitizenship(Status $status, int $citizenshipId): Collection
    {
        return $this->model->where('active', $status->getValue())->whereHas(
            'userDetail',
            function (Builder $query) use ($citizenshipId) {
                $query->where('citizenship_country_id', $citizenshipId);
            }
        )->get();
    }
}