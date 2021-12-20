<?php

namespace App\Onion\Service;

interface BookServiceInterface {

    public function show(int $book_id);

    public function exist(int $book_id);

    public function checkBorrowedBook($book_id , $user_id);

    public function returnBook($book_id , $user_id);
    

}