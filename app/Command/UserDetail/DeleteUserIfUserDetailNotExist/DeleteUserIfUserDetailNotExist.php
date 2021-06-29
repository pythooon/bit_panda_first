<?php

declare(strict_types=1);

namespace App\Command\UserDetail\DeleteUserIfUserDetailNotExist;

use App\Commons\CommandBus\Command;

class DeleteUserIfUserDetailNotExist implements Command
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}