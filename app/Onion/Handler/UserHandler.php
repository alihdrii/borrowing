<?php 

namespace App\Onion\Handler;

use App\Onion\Service\UserExist;
use App\Onion\Service\BookExist;
use App\Onion\Driver\UserLaravelRepository;
use App\Onion\Driver\BookLaravelRepository;
use App\Onion\Service\UserService;
use App\Onion\UseCase\BorrowBookUseCase;

class UserHandler{

    private $request;
    private $repository;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function borrowBook(){

        $user_id = $this->request->user_id;
        $book_id = $this->request->book_id; 
                                           
        return (new BorrowBookUseCase(new UserService() , new BookExist(new BookLaravelRepository(), $book_id )))->lent();

    }
}