<?php

namespace App\Onion\Service;

use App\Onion\Driver\UserRepositoryInterface;
use Exception;

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

    public function libraryMember($user_id){
        if($this->repository->checkLibraryMemberExist($user_id)){
            return true;
        }
        return false;
    }

    public function borrowedBookMoreThanCheck($user_id , $max){
        if(count($this->repository->userBorrowedBook($user_id)) > 3){
            return false;
        }
        return true;
    }

    public function borrowBook($user_id , $book_id , $started_at , $day_of_loan){
        try{
            $this->repository->barrowBook($user_id , $book_id , $started_at , $day_of_loan);
        }catch (Exception $e){

        }
    }

}