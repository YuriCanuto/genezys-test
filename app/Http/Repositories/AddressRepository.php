<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\AddressRepositoryInterface;
use App\Models\Adresses;
use App\Models\User;

class AddressRepository implements AddressRepositoryInterface
{
    public function __construct(protected Adresses $address)
    {

    }

    /**
     * @param User $user
     * @param array $data
     * @return void
     */
    public function create(User $user, array $data): void
    {
        $user->adresses()->create($data);
    }

}
