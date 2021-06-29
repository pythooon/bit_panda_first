<?php

declare(strict_types=1);

namespace Tests\Feature\FindAustrianActiveUsers;

use Tests\TestCase;

class FindAustrianActiveUsersTest extends TestCase
{
    private FindAustrianActiveUsersTestData $testData;
    private FindAustrianActiveUsersAssertion $assertion;

    public function test_FindAustrianActiveUsers_ShouldReturnValidData(): void
    {
        $this->assertion->assertSuccessGetAustrianActiveUsers(
            $this->testData->getValidDataForRequestBody(),
            $this->testData->getHeaders()
        );

        $this->assertion->assertDoubleAustrianActiveUsers(
            $this->testData->getValidDataForRequestBody(),
            $this->testData->getHeaders()
        );
    }

    public function test_FindAustrianActiveUsers_ShouldReturnInvalidData(): void
    {
        $this->assertion->assertZeroUsers(
            $this->testData->getInvalidDataForRequestBody(),
            $this->testData->getHeaders()
        );
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->testData = new FindAustrianActiveUsersTestData();
        $this->assertion = new FindAustrianActiveUsersAssertion($this);
    }
}