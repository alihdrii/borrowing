<?php

namespace App\Onion\Driver;

use App\Models\Book;
use App\Models\lent_book;
use App\Onion\Entity\Book as EntityBook;
use App\Onion\Service\BookRepositoryInterface;

class BookElasticRepository implements BookRepositoryInterface{

    public function getAll()
    {
        return ;
    }

    public function get(int $id){
        return ;
    }

    public function getById(int $id){
        return ;
    }


    public function lentBook($request){
        return ;

    }

    public function checkLentBookByUserId($request){
        return ;
    }

}