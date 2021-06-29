<?php

declare(strict_types=1);

namespace App\Commons\CommandBus;

use App\Commons\Bus\Bus;

class CommandBusImpl extends Bus implements CommandBus
{
    public function handle(Command $command): void
    {
        $className = get_class($command);
        $this->app->make($this->appendHandlerPostfix($className))->handle($command);
    }
}