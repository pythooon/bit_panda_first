<?php

declare(strict_types=1);

namespace App\Query\Country\FindOneByIso;

use App\Models\Country;
use App\Repository\Country\CountryRepository;

class FindOneByIsoHandler
{
    private CountryRepository $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function handle(FindOneByIso $query): Country
    {
        return $this->countryRepository->findOneByIso($query->getIso());
    }
}