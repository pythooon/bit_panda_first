<?php

declare(strict_types=1);

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepository
{
    public function find(int $id): ?Model;

    public function findOrFail(int $id): Model;

    public function findAll(): Collection;

    public function create(array $attributes): void;

    public function delete(int $id): void;

    public function update(int $id, array $attributes): void;
}