<?php

declare(strict_types=1);

namespace App\Repository\Country;

use App\Models\Country;
use App\Repository\Base\BaseRepository;
use App\ValueObject\Country\Iso;

interface CountryRepository extends BaseRepository
{
    public function findOneByIso(Iso $iso): Country;
}