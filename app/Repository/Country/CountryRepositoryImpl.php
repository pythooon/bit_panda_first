<?php

declare(strict_types=1);

namespace App\Repository\Country;

use App\Models\Country;
use App\Repository\Base\BaseRepositoryImpl;
use App\ValueObject\Country\Iso;

class CountryRepositoryImpl extends BaseRepositoryImpl implements CountryRepository
{
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }

    public function findOneByIso(Iso $iso): Country
    {
        return $this->model->where($iso->getTypeValue(), $iso->getValue())->firstOrFail();
    }
}