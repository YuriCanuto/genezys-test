<?php

namespace App\Http\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function list();
}
