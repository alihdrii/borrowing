<?php

namespace App\Onion\Service;

use App\Models\Book;
use App\Models\lent_book;
use App\Onion\Domain\Entity\Book as EntityBook;
use App\Onion\Service\BookRepositoryInterface;

class BookLaravelRepository implements BookRepositoryInterface{

    public function getAll()
    {
        return Book::all()->toArray();
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

    public function lentBook($request){

        try{

            $lent_elequent = new lent_book;

            $lent_elequent->user_id = $request->user_id;
            $lent_elequent->book_id = $request->book_id;
            $lent_elequent->day_of_loan = $request->day_of_loan;
            $lent_elequent->started_at = $request->started_at;
    
            $lent_elequent->save();
            return true;
    
        } catch(\Exception $e){
            return false;
        }

    }

    public function checkByIdIfNotLoanCreate($request){
        if(lent_book::where('book_id' , $request->book_id)->exist()){
            return $this->lentBook($request);
        }
        return false;
    }

}