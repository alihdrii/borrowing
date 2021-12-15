<?php 

namespace App\Onion\Handler;

use App\Onion\Service\UserExist;
use App\Onion\Service\BookExist;
use App\Onion\Driver\UserLaravelRepository;
use App\Onion\Driver\BookLaravelRepository;
use App\Onion\UseCase\BorrowBookUseCase;

class UserLentHandler{

    private $request;
    private $repository;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle(){

        $user_id = $this->request->user_id;
        $book_id = $this->request->book_id; 
                                           
        return (new BorrowBookUseCase(new UserExist(new UserLaravelRepository(), $user_id) , new BookExist(new BookLaravelRepository(), $book_id )))->lent();

    }
}