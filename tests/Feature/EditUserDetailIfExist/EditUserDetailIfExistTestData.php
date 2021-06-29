<?php

declare(strict_types=1);

namespace Tests\Feature\EditUserDetailIfExist;

use Tests\Feature\HttpTestDataTrait;

class EditUserDetailIfExistTestData
{
    use HttpTestDataTrait;

    public function getValidDataForRequestBody(): array
    {
        return [
            'citizenship_country_id' => 1,
            'first_name' => 'Test',
            'last_name' => 'Test',
            'phone_number' => '999333444'
        ];
    }

    public function getInvalidDataForRequestBody(): array
    {
        return [
            'citizenship_country_id' => 11,
            'first_name' => 'Test',
            'last_name' => 'Test',
            'phone_number' => '999333444'
        ];
    }
}