<?php 

namespace App\Onion\UseCase ;

use App\Onion\Driver\BookRepositoryInterface;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\ServiceInterface;
use App\Onion\Service\UserServiceInterface;
use App\Onion\UseCase\Interfaces\BorrowUseCaseInterface;
use Exception;

class BorrowBookUseCase implements BorrowUseCaseInterface{

    private $user_service;
    private $book_service;


    public function __construct(BookServiceInterface $book_service , UserServiceInterface $user_service)
    {
        $this->user_service = $user_service;
        $this->book_service = $book_service;
    }

    public function handle($request)
    {

        $req_data = $request->data();

        if($this->user_service->exist($req_data['user_id']) && $this->user_service->libraryMember($req_data['user_id'])){
            if($this->book_service->exist($req_data['book_id'])){
                if($this->user_service->borrowedBookMoreThanCheck($req_data['book_id'] , 3)){
                    if(!($this->user_service->borrowBook($req_data['user_id'] , $req_data['book_id'] , $req_data['started_at'] , $req_data['day_of_loan'])))
                        throw new Exception("problem in borrowing book");
                }
                throw new Exception("user has more than maximum borrowed book");
            }
            throw new Exception("book Not Exist");
        }
        throw new Exception("User Not Exist");
        
    }

}