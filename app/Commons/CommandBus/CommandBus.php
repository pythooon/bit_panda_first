<?php

declare(strict_types=1);

namespace App\Commons\CommandBus;

interface CommandBus
{
    public function handle(Command $command): void;
}