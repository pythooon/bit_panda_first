<?php

declare(strict_types=1);

namespace App\Service;

use App\Command\UserDetail\DeleteUserIfUserDetailNotExist\DeleteUserIfUserDetailNotExist;
use App\Command\UserDetail\EditUserDetailIfExist\EditUserDetailIfExist;
use App\Commons\CommandBus\CommandBus;
use App\Commons\QueryBus\QueryBus;
use App\Contract\User\FindUserByStatusAndCitizenCountryContract;
use App\Contract\UserDetail\EditUserDetailContract;
use App\Query\User\FindByStatusAndCitizenship\FindByStatusAndCitizenship;
use App\Query\Country\FindOneByIso\FindOneByIso;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserService
{
    private QueryBus $queryBus;
    private CommandBus $commandBus;

    public function __construct(QueryBus $queryBus, CommandBus $commandBus)
    {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
    }

    public function findByStatusAndCitizenshipUsers(FindUserByStatusAndCitizenCountryContract $contract): AnonymousResourceCollection
    {
        $citizenship = $this->queryBus->handle(new FindOneByIso($contract->getIso()));
        return $this->queryBus->handle(new FindByStatusAndCitizenship($contract->getStatus(), $citizenship->getId()));
    }

    public function editUserDetailIfExist(int $id, EditUserDetailContract $contract): void
    {
        $this->commandBus->handle(new EditUserDetailIfExist($id, $contract));
    }

    public function deleteUserIfUserDetailNotExist(int $id): void
    {
        $this->commandBus->handle(new DeleteUserIfUserDetailNotExist($id));
    }
}