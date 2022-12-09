<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected User $user)
    {

    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /** @return Collection<int, User>  */
    public function list()
    {
        return $this->user->with(['adresses' => function ($q) {
            $q->where('is_main', true)->first();
        }])->get();
    }

}
