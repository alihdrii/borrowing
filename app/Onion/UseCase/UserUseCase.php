<?php 

namespace App\Onion\UseCase;

use App\Onion\Entity\Book;
use App\Onion\Driver\UserRepositoryInterface;
use App\Onion\UseCase\Interfaces\UserUseCaseInterface;

class UserUseCase implements UserUseCaseInterface{

    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;                            
    }
       
    public function show($book_id){

    }

    public function lentBook($request)
    {
        if($this->repository->userLentBook($request->user_id , $request->book_id)){
            $this->repository->lentBook($request);
        }
        
    }

}