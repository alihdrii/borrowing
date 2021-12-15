<?php

namespace App\Onion\Service;

use App\Onion\Driver\BookRepositoryInterface;

class BookExist implements ServiceInterface{

    private $repository;
    private $user_id;

    public function __construct(BookRepositoryInterface $repository , int $book_id)
    {
        $this->repository = $repository;
        $this->user_id = $book_id;
    }

    public function handle()
    {
        if($this->repository->getById($this->user_id)){
            return true;
        }
        return false;
    }
}
