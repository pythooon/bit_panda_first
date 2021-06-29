<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'active'
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->active === 1 ? true : false;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function hasUserDetail(): bool
    {
        return $this->userDetail !== null;
    }

    public function getUserDetail(): UserDetail
    {
        return $this->userDetail;
    }

    public function userDetail(): HasOne
    {
        return $this->hasOne(UserDetail::class);
    }
}
