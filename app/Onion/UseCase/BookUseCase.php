<?php 

namespace App\Onion\UseCase;

use App\Onion\Driver\BookRepositoryInterface;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;

class BookUseCase implements BookUseCaseInterface{

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
        if($this->repository->checkLentBookByUserId($request->id)){
            $this->repository->lentBook($request);
        }
        
    }

}