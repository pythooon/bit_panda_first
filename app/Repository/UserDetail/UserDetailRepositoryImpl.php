<?php

declare(strict_types=1);

namespace App\Repository\UserDetail;

use App\Models\UserDetail;
use App\Repository\Base\BaseRepositoryImpl;

class UserDetailRepositoryImpl extends BaseRepositoryImpl implements UserDetailRepository
{
    public function __construct(UserDetail $model)
    {
        parent::__construct($model);
    }
}