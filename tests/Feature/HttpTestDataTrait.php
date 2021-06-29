<?php

declare(strict_types=1);

namespace Tests\Feature;

trait HttpTestDataTrait
{
    public function getHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
    }

    public function getTestUserDataIdWhichHasUserDetail(): int
    {
        return 1;
    }

    public function getTestUserDataIdWhichHasNotUserDetail(): int
    {
        return 2;
    }

    public function getTestUserDataIdWhichNotExist(): int
    {
        return 11;
    }
}