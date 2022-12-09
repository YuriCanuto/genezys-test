<?php

namespace App\Http\Repositories\Contracts;

use App\Models\User;

interface AddressRepositoryInterface
{
    public function create(User $user, array $data);
}
