<?php

declare(strict_types=1);

namespace Tests\Feature\DeleteUserIfUserDetailNotExist;

use Tests\TestCase;

class DeleteUserIfUserDetailNotExistAssertion
{
    private TestCase $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function assertSuccessStatus(int $id, array $headers): void
    {
        $this->testCase->json('DELETE', route('users.delete', ['id' => $id]), [], $headers)
            ->assertSuccessful()->assertStatus(204);
    }

    public function assertNotFoundStatus(int $id, array $headers): void
    {
        $this->testCase->json('DELETE', route('users.delete', ['id' => $id]), [], $headers)
            ->assertNotFound();
    }

    public function assertForbiddenStatus(int $id, array $headers): void
    {
        $this->testCase->json('DELETE', route('users.delete', ['id' => $id]), [], $headers)
            ->assertStatus(403);
    }
}