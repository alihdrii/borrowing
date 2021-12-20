<?php 

namespace App\Onion\UseCase;

use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;
use App\Onion\UseCase\Interfaces\ReturnBorrowedBookUseCaseIntereface;
use Exception;

class ReturnBorrowedBookUseCase  implements ReturnBorrowedBookUseCaseIntereface{

    private $service;
    private $book_id;
    
    public function __construct(BookServiceInterface $book_service , UserServiceInterface $user_service , $book_id , $user_id)
    {
        $this->user_service = $user_service;
        $this->book_service = $book_service;
        $this->book_id = $book_id;
        $this->user_id = $user_id;
    }

    public function __invoke()
    {

        if($this->book_service->checkBorrowedBook($this->book_id , $this->user_id)){
            return $this->book_service->returnBook($this->book_id , $this->user_id);
        }
        throw new Exception("book is not borrowed to the user");
 
    }

}