<?php

declare(strict_types=1);

namespace Tests\Feature\FindAustrianActiveUsers;

use App\ValueObject\Country\Iso;
use App\ValueObject\User\Status;
use Tests\Feature\HttpTestDataTrait;

class FindAustrianActiveUsersTestData
{
    use HttpTestDataTrait;

    public function getValidDataForRequestBody(): array
    {
        return [
            'status' => $this->getStatusIsActive()->getValue(),
            'iso' => $this->getIsoForAustria()->getValue()
        ];
    }

    public function getInvalidDataForRequestBody(): array
    {
        return [
            'status' => $this->getStatusIsInactive()->getValue(),
            'iso' => $this->getIsoForFrance()->getValue()
        ];
    }


    public function getIsoForAustria(): Iso
    {
        return Iso::fromString('AT');
    }

    public function getIsoForFrance(): Iso
    {
        return Iso::fromString('FR');
    }

    public function getStatusIsActive(): Status
    {
        return Status::active();
    }

    public function getStatusIsInactive(): Status
    {
        return Status::active();
    }
}