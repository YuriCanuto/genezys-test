<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {

    }

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    /** @return Collection<int, User>  */
    public function list()
    {
        return $this->userRepository->list();
    }
}
