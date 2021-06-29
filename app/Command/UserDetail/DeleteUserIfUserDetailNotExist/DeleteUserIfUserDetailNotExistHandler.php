<?php

declare(strict_types=1);

namespace App\Command\UserDetail\DeleteUserIfUserDetailNotExist;

use App\Exceptions\NotPermittedOperationException;
use App\Models\User;
use App\Repository\User\UserRepository;

class DeleteUserIfUserDetailNotExistHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(DeleteUserIfUserDetailNotExist $command): void
    {
        /** @var User $user */
        $user = $this->userRepository->findOrFail($command->getId());

        if ($user->hasUserDetail()) {
            throw new NotPermittedOperationException('User has user details, you cannot delete this user');
        }

        $user->delete();
    }
}