<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserDetail\EditUserDetailRequest;
use App\Http\Requests\User\FindUserByStatusAndCitizenCountryRequest;
use App\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function findByActiveStatusAndAustrianCitizenshipUsers(FindUserByStatusAndCitizenCountryRequest $request): JsonResponse
    {
        return new JsonResponse($this->service->findByStatusAndCitizenshipUsers($request), 200);
    }

    public function editUserDetailIfExist(EditUserDetailRequest $request, int $id): JsonResponse
    {
        $this->service->editUserDetailIfExist($id, $request);
        return new JsonResponse(null, 204);
    }

    public function deleteUserIfUserDetailNotExist(int $id): JsonResponse
    {
        $this->service->deleteUserIfUserDetailNotExist($id);
        return new JsonResponse(null, 204);
    }
}