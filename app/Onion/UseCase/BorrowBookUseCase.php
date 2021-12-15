<?php 

namespace App\Onion\UseCase ;

use App\Onion\Driver\BookRepositoryInterface;
use App\Onion\Service\ServiceInterface;
use App\Onion\UseCase\Interfaces\BorrowUseCaseInterface;

class BorrowBookUseCase implements BorrowUseCaseInterface{

    private $repository;
    private $user_exist;
    private $book_exist;

    public function __construct(ServiceInterface $user_exist , ServiceInterface $book_exist)
    {
        $this->user_exist = $user_exist;
        $this->book_exist = $book_exist;
    }

    public function lent(){

        if($this->user_exist->handle() && $this->book_exist->handle()){
            
        }
        return false;

    }

}