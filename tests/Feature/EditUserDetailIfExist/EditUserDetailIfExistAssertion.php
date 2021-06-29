<?php

declare(strict_types=1);

namespace Tests\Feature\EditUserDetailIfExist;

use Tests\TestCase;

class EditUserDetailIfExistAssertion
{
    private TestCase $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function assertSuccessStatus(int $id, array $data, array $headers): void
    {
        $this->testCase->json('PUT', route('users.user-detail.edit', ['id' => $id]), $data, $headers)
            ->assertSuccessful()->assertStatus(204);
    }

    public function assertNotFoundStatus(int $id, array $data, array $headers): void
    {
        $this->testCase->json('PUT', route('users.user-detail.edit', ['id' => $id]), $data, $headers)
            ->assertNotFound();
    }

    public function assertInvalidValidationStatus(int $id, array $data, array $headers): void
    {
        $this->testCase->json('PUT', route('users.user-detail.edit', ['id' => $id]), $data, $headers)
            ->assertStatus(422);
    }

    public function assertForbiddenStatus(int $id, array $data, array $headers): void
    {
        $this->testCase->json('PUT', route('users.user-detail.edit', ['id' => $id]), $data, $headers)
            ->assertStatus(403);
    }
}