<?php

namespace App\Onion\Service;

use App\Onion\Driver\UserRepositoryInterface;

class UserService implements UserServiceInterface{

    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function exist(int $user_id)
    {
        if($this->repository->getById($user_id)){
            return true;
        }
        return false;
    }


}