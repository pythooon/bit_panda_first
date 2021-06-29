<?php

declare(strict_types=1);

namespace App\Command\UserDetail\EditUserDetailIfExist;

use App\Exceptions\NotPermittedOperationException;
use App\Models\User;
use App\Models\UserDetail;
use App\Repository\User\UserRepository;

class EditUserDetailIfExistHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(EditUserDetailIfExist $command): void
    {
        $contract = $command->getContract();

        /** @var User $userDetail */
        $user = $this->userRepository->findOrFail($command->getId());

        if (!$user->hasUserDetail()) {
            throw new NotPermittedOperationException(
                'You cannot edit user details, because this user has not any user detail'
            );
        }

        $userDetail = $user->getUserDetail();
        $userDetail->setCitizenshipCountryId($contract->getCitizenshipCountryId());
        $userDetail->setFirstName($contract->getFirstName());
        $userDetail->setLastName($contract->getLastName());
        $userDetail->setPhoneNumber($contract->getPhoneNumber());
        $userDetail->save();
    }
}