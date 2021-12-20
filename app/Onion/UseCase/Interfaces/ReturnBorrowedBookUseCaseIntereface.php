<?php 

namespace App\Onion\UseCase\Interfaces;

use App\Onion\Driver\RequestInterface;
use App\Onion\Service\BookServiceInterface;
use App\Onion\Service\UserServiceInterface;

interface ReturnBorrowedBookUseCaseIntereface{
    
    public function __construct(BookServiceInterface $book_service , UserServiceInterface $user_service , $book_id , $user_id);
    
    public function handle(array $req);

}