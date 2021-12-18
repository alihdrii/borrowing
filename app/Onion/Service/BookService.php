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
        // return ' hele';
        // dd($this->repository);
        if($this->exist($book_id))
             return $this->repository->get($book_id);
        return false;
    }
    
    public function exist(int $book_id) : bool
    {

        if($this->repository->getById($book_id)){
            // echo '<pre>';
            // print_r($this->repository->getById($book_id));
            dd('true');
            return true;
        }
        dd('false');
        
        return false;
    }


}