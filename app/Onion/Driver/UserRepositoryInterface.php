<?php 

namespace App\Onion\Driver;

interface UserRepositoryInterface{

    public function getById(int $id);

    public function lentBook($request);
    
    public function userLentBook($user_id , $book_id);

    public function checkLibraryMemberExist($user_id);

    public function userBorrowedBook($user_id);

    public function barrowBook($user_id , $book_id , $started_at , $day_of_loan);
    
}