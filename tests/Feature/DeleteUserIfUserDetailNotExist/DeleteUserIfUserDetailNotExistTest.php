<?php

declare(strict_types=1);

namespace Tests\Feature\DeleteUserIfUserDetailNotExist;

use Tests\TestCase;

class DeleteUserIfUserDetailNotExistTest extends TestCase
{
    private DeleteUserIfUserDetailNotExistTestData $testData;
    private DeleteUserIfUserDetailNotExistAssertion $assertion;

    public function test_DeleteUserIfUserDetailNotExist_ShouldReturnSuccessStatus(): void
    {
        $this->assertion->assertSuccessStatus(
            $this->testData->getTestUserDataIdWhichHasNotUserDetail(),
            $this->testData->getHeaders()
        );
        $this->testData->revertDeletedUser();
    }

    public function test_DeleteUserIfUserDetailNotExist_ShouldReturnNotFoundStatus(): void
    {
        $this->assertion->assertNotFoundStatus(
            $this->testData->getTestUserDataIdWhichNotExist(),
            $this->testData->getHeaders()
        );
    }

    public function test_DeleteUserIfUserDetailNotExist_ShouldReturnForbiddenStatus(): void
    {
        $this->assertion->assertForbiddenStatus(
            $this->testData->getTestUserDataIdWhichHasUserDetail(),
            $this->testData->getHeaders()
        );
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->testData = new DeleteUserIfUserDetailNotExistTestData();
        $this->assertion = new DeleteUserIfUserDetailNotExistAssertion($this);
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}