<?php

namespace App\Onion\Domain\Entity;

use App\Onion\Domain\Valueobject\LentBook;

class Book{

    public $id;
    public $name;
    public $author;
    public $publisher;
    public $published_at;
    public $rate;
    public $isbn;

    public function lentBook($request){
        
        $lents = new lentBook();
        $lents->borrowBook($request);
        
    }
}