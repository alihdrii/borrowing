<?php

namespace App\Onion\Driver;

use App\Models\Book;
use App\Models\lent_book;
use App\Onion\Entity\Book as EntityBook;
use App\Onion\Driver\BookRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BookElasticRepository implements BookRepositoryInterface{

    public function getAll()
    {
        return ;
    }

    public function get(int $id){

        $elequent = Book::find($id);

        $book = new EntityBook();
        $book->id = $elequent->id;
        $book->name = $elequent->name;
        $book->publisher = $elequent->publisher;
        $book->isbn = $elequent->isbn;
        $book->published_at = $elequent->published_at;
        return $book;
        
    }

    public function getById(int $id){
        return Book::where('id' , $id)->get()->exist();
        // return DB::table('books')->where('id', $id)->exists();

        // return DB::table('books')->
    }

    public function lentBook($request){
        return ;
    }

    public function checkLentBookByUserId($request){
        return ;
    }

}