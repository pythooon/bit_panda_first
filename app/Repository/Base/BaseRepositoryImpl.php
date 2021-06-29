<?php

declare(strict_types=1);

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepositoryImpl implements BaseRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function findOrFail(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(array $attributes): void
    {
        $this->model->create($attributes);
    }

    public function delete(int $id): void
    {
        $model = $this->findOrFail($id);
        $model->delete();
    }

    public function update(int $id, array $attributes): void
    {
        $model = $this->model->findOrFail($id);
        $model->update($attributes);
    }
}