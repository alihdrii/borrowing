<?php

namespace App\Onion\Driver;

use App\Models\Book;
use App\Models\lent_book;
use App\Onion\Entity\Book as EntityBook;
use App\Onion\Driver\BookRepositoryInterface;

class BookLaravelRepository implements BookRepositoryInterface{

    public function getAll()
    {
        // return Book::all()->toArray();
    }

    public function getById(int $id){
        $elequent = Book::find($id);

        $book = new EntityBook();

        $book->setId($elequent->id);
        $book->setName($elequent->name);
        $book->setPublisher($elequent->publisher);
        $book->setIsnb($elequent->isbn);
        $book->setPublishedAt($elequent->published_at);
        
        return $book->body();
    }

    public function get(int $id){

        $elequent = Book::find($id);

        $book = new EntityBook();

        $book->setId($elequent->id);
        $book->setName($elequent->name);
        $book->setPublisher($elequent->publisher);
        $book->setIsnb($elequent->isbn);
        $book->setPublishedAt($elequent->published_at);
        
        return $book->body();
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

    public function checkLentBookByUserId($request){
        if(lent_book::where('book_id' , $request->book_id)->exist()){
            return true;
        }
        return false;
    }

    public function getUserBorrowBook($user_id , $book_id){
        return lent_book::where('book_id' , $book_id)->where('user-id' , $user_id)->get();            
    }

    public function returnBook($user_id , $book_id){
        lent_book::where('book_id' , $book_id)->where('user-id' , $user_id)->delete();            
    }

}