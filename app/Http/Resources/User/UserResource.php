<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $userArr = [
            'id' => $this->getId(),
            'email' => $this->getEmail(),
            'active' => $this->isActive(),

            'updated_at' => $this->getUpdatedAt(),
            'created_at' => $this->getCreatedAt()
        ];

        if ($this->hasUserDetail()) {
            $userDetail = $this->userDetail;
            $userArr['user_detail'] = [
                'first_name' => $userDetail->getFirstName(),
                'last_name' => $userDetail->getLastName(),
                'phone_number' => $userDetail->getPhoneNumber(),
                'citizenCountry' => $userDetail->getCitizenshipCountryName()
            ];
        }

        return $userArr;
    }
}
