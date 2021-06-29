<?php

declare(strict_types=1);

namespace Tests\Feature\EditUserDetailIfExist;

use Tests\TestCase;

class EditUserDetailIfExistTest extends TestCase
{
    private EditUserDetailIfExistTestData $testData;
    private EditUserDetailIfExistAssertion $assertion;

    public function test_EditUserDetailIfExist_UserHasUserDetail_ShouldReturnSuccessStatus()
    {
        $this->assertion->assertSuccessStatus(
            $this->testData->getTestUserDataIdWhichHasUserDetail(),
            $this->testData->getValidDataForRequestBody(),
            $this->testData->getHeaders()
        );
    }

    public function test_EditUserDetailIfExist_UserHasNotUserDetail_ShouldReturnForbiddenStatus()
    {
        $this->assertion->assertForbiddenStatus(
            $this->testData->getTestUserDataIdWhichHasNotUserDetail(),
            $this->testData->getValidDataForRequestBody(),
            $this->testData->getHeaders()
        );
    }

    public function test_EditUserDetailIfExist_UserNotExist_ShouldReturnNotFoundStatus()
    {
        $this->assertion->assertNotFoundStatus(
            $this->testData->getTestUserDataIdWhichNotExist(),
            $this->testData->getValidDataForRequestBody(),
            $this->testData->getHeaders()
        );
    }

    public function test_EditUserDetailIfExist_UserHasUserDetail_ButHaveInvalidRequestData_ShouldReturnNotFoundStatus()
    {
        $this->assertion->assertInvalidValidationStatus(
            $this->testData->getTestUserDataIdWhichNotExist(),
            $this->testData->getInvalidDataForRequestBody(),
            $this->testData->getHeaders()
        );
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->testData = new EditUserDetailIfExistTestData();
        $this->assertion = new EditUserDetailIfExistAssertion($this);
    }
}