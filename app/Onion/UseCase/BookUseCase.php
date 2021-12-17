<?php 

namespace App\Onion\UseCase;

use App\Onion\Driver\BookRepositoryInterface;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;
use App\Onion\UseCase\Interfaces\BookUseCaseInterface;

class BookUseCase implements BookUseCaseInterface{
    // class BookUseCase {
        private $repository;
        private $service;
    
        public function __construct(BookServiceInterface $service)
        {
            $this->service = $service;
        }

    public function index(){
        return ;
    }

    public function show(){
        // return 'kkk';
        return ($this->service)->show(150);
        // return $service->show();
    }

    public function lentBook($request)
    {
        // if($this->repository->checkLentBookByUserId($request->id)){
        //     $this->repository->lentBook($request);
        // }
        
    }

}