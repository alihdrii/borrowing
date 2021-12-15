<?php

namespace App\Onion\Service;

use App\Onion\Driver\UserRepositoryInterface;

class UserExist implements ServiceInterface{

    private $repository;
    private $user_id;

    public function __construct(UserRepositoryInterface $repository , int $user_id)
    {
        $this->repository = $repository;
        $this->user_id = $user_id;
    }

    public function handle()
    {
        if($this->repository->getById($this->user_id)){
            return true;
        }
        return false;
    }


}