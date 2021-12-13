<?php 

namespace App\Onion\Handler;

use App\Onion\Domain\Entity\Book;
use App\Onion\UseCase\BookUseCaseInterface;

// use Onion\UseCase\BookUseCaseInterface;

class BookLentHandler{

    private $service;

    public function __construct(BookUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request){
        return $this->service->borrow($request);
    }

}