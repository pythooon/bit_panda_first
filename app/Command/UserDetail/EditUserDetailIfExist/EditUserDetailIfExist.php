<?php

declare(strict_types=1);

namespace App\Command\UserDetail\EditUserDetailIfExist;

use App\Commons\CommandBus\Command;
use App\Contract\UserDetail\EditUserDetailContract;

class EditUserDetailIfExist implements Command
{
    private int $id;
    private EditUserDetailContract $contract;

    public function __construct(int $id, EditUserDetailContract $contract)
    {
        $this->id = $id;
        $this->contract = $contract;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContract(): EditUserDetailContract
    {
        return $this->contract;
    }
}