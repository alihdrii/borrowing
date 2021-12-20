<?php

namespace App\Onion\Service;

use App\Onion\Driver\BookRepositoryInterface;
use App\Onion\Entity\Book;

class BookService implements BookServiceInterface{

    private $repository;

    public function __construct(BookRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function show(int $book_id) 
    {
        if($this->exist($book_id))
             return $this->repository->get($book_id);
        return false;
    }
    
    public function exist(int $book_id)
    {
        if($this->repository->getById($book_id)){
            return true;
        }
        return false;
    }

    public function checkBorrowedBook($book_id , $user_id){
        if($this->repository->getUserBorrowBook($book_id , $user_id)){
            return true;
        }
        return false;
    }

    public function returnBook($book_id , $user_id){
        $this->repository->returnBook($book_id , $user_id);
    }

}