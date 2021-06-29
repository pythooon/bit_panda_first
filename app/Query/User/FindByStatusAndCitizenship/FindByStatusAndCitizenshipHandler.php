<?php

declare(strict_types=1);

namespace App\Query\User\FindByStatusAndCitizenship;

use App\Http\Resources\User\UserResource;
use App\Repository\User\UserRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FindByStatusAndCitizenshipHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindByStatusAndCitizenship $command): AnonymousResourceCollection
    {
        $users = $this->userRepository->findByStatusAndCitizenship($command->getStatus(), $command->getCitizenshipId());

        return UserResource::collection($users);
    }
}