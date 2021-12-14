<?php 

namespace App\Onion\UseCase;

use App\Onion\Service\BookRepositoryInterface;
use App\Onion\UseCase\BookUseCaseInterface;

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