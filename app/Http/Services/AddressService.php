<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\AddressRepositoryInterface;
use App\Models\User;

class AddressService
{
    public function __construct(protected AddressRepositoryInterface $addressRepository)
    {

    }

    /**
     * @param array $data
     * @return void
     */
    public function create(User $user, array $data): void
    {
        $this->addressRepository->create($user, $data);
    }
}
