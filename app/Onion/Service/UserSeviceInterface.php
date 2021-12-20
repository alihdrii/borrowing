<?php

namespace App\Onion\Service;

interface UserServiceInterface {

    public function exist(int $user_id);
    public function libraryMember(int $user_id);
    public function borrowedBookMoreThanCheck($book_id , $max);
    public function borrowBook($user_id , $book_id , $started_at , $day_of_loan);

}