<?php 

namespace App\Onion\UseCase;

use App\Onion\Domain\Entity\Book;
use App\Onion\Service\BookRepositoryInterface;
use App\Onion\UseCase\BookUseCaseInterface;

class BookService implements BookUseCaseInterface{

    private $repository;

    public function __construct(BookRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        return $this->repository->getAll();
    }

    public function show($book_id){

    }

    public function lentBook($request)
    {
        if($this->repository->checkByIdIfNotLoanCreate($request->id)){
            $this->repository->lentBook($request);
        }

    }   

}