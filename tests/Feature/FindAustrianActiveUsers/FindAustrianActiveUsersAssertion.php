<?php

declare(strict_types=1);

namespace Tests\Feature\FindAustrianActiveUsers;

use Tests\TestCase;

class FindAustrianActiveUsersAssertion
{
    private TestCase $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function assertSuccessGetAustrianActiveUsers(array $data, array $headers): void
    {
        $this->testCase->json('GET', route('users.list'), $data, $headers)->assertSuccessful()->assertJson(
            [
                [
                    'active' => true,
                    'user_detail' => ['citizenCountry' => 'Austria']
                ]
            ]
        );
    }

    public function assertDoubleAustrianActiveUsers(array $data, array $headers)
    {
        $this->testCase->json('GET', route('users.list'), $data, $headers)->assertJsonCount(2);
    }

    public function assertZeroUsers(array $data, array $headers)
    {
        $this->testCase->json('GET', route('users.list'), $data, $headers)->assertJsonCount(0);
    }
}