<?php 

namespace App\Onion\Service;

interface UserRepositoryInterface{

    public function getById(int $id);

    public function lentBook($request);
    
    public function userLentBook($user_id , $book_id);
    
}