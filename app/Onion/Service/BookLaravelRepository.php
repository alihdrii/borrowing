<?php

namespace App\Onion\Service;

use App\Models\Book;
use App\Onion\Service\BookRepositoryInterface;

class BookLaravelRepository implements BookRepositoryInterface{

    public function getAll()
    {
        // return 'hi';
        return Book::all()->toArray();
    }

    public function get(int $id){
        
    }


}