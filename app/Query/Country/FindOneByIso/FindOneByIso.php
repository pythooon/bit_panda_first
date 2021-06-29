<?php

declare(strict_types=1);

namespace App\Query\Country\FindOneByIso;

use App\Commons\QueryBus\Query;
use App\ValueObject\Country\Iso;

class FindOneByIso implements Query
{
    private Iso $iso;

    public function __construct(Iso $iso)
    {
        $this->iso = $iso;
    }

    public function getIso(): Iso
    {
        return $this->iso;
    }
}