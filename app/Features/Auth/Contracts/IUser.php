<?php

namespace App\Features\Auth\Contracts;

use App\Core\TypedResult;

interface IUser
{
    public function create(array $data): TypedResult;
    public function update(int $id, array $data): TypedResult;
    public function delete(int $id): TypedResult;
}